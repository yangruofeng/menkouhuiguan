//app.js
const request = require('/utils/request.js');
const config = require("/config.js");
App({
  onLaunch: function () {

   var that = this;
    // 1 首先检查是否有版本更新
   this.checkUpdate();
    
    // 2. 检查登录令牌是否失效
    var token = wx.getStorageSync('token');
    console.log(token);
    if (!token) {
      this.memberLogin();
    } else {
      // 检查token过期
      this.checkToken(token);
    }

    // 3. 获取用户信息
    this.getUserInfo(function(userInfo){
        if( userInfo ){
             // 可以将 res 发送给后台解码出 unionId
             that.globalData.userInfo = userInfo;
             // 由于 getUserInfo 是网络请求，可能会在 Page.onLoad 之后才返回
             // 所以此处加入 callback 以防止这种情况
             if (that.userInfoReadyCallback) {
               that.userInfoReadyCallback(userInfo);
             }
        }
    });
    
  },
  userInfoReadyCallback:function(userInfo){
    this.globalData.userInfo = userInfo;
    this.updateMemberInfo(userInfo);
  },
  getUserInfo:function(cb){
      var type = typeof cb;
      var is_callback = false;
      if( type == 'function' ){
          is_callback = true;
      }
      var that = this;
      if( this.globalData.userInfo ){
          is_callback && cb(this.globalData.userInfo);
      }else{
        wx.getSetting({
          success: res => {
            if (res.authSetting['scope.userInfo']) {
              // 已经授权，可以直接调用 getUserInfo 获取头像昵称，不会弹框
              that.authSetting = true;
              wx.getUserInfo({
                success: res => {
                  that.globalData.userInfo = res.userInfo;
                  // 由于 getUserInfo 是网络请求，可能会在 Page.onLoad 之后才返回
                  // 所以此处加入 callback 以防止这种情况
                  is_callback &&  cb(res.userInfo);
                },
                fail:function(){
                  is_callback && cb(null);
                }
              })
            }else{
              is_callback && cb(null);
            }
          },
          fail:function(){
             is_callback && cb(null);
          }
        })

      }
  },
  checkUpdate:function(){
    // 获取小程序更新机制兼容
    if (wx.canIUse('getUpdateManager')) {
      const updateManager = wx.getUpdateManager()
      updateManager.onCheckForUpdate(function(res) {
        // 请求完新版本信息的回调
        if (res.hasUpdate) {
          updateManager.onUpdateReady(function() {
            wx.showModal({
              title: '更新提示',
              content: '新版本已经上线啦~，为了获得更好的体验，建议立即更新',
              showCancel: false,
              confirmColor: "#5677FC",
              success: function(res) {
                // 新的版本已经下载好，调用 applyUpdate 应用新版本并重启
                updateManager.applyUpdate()
              }
            })
          })
          updateManager.onUpdateFailed(function() {
            // 新的版本下载失败
            wx.showModal({
              title: '更新失败',
              content: '新版本更新失败，为了获得更好的体验，请您删除当前小程序，重新搜索打开',
              confirmColor: "#5677FC",
              showCancel: false
            })
          })
        }
      })
    } else {
      // 当前微信版本过低，无法使用该功能
      wx.showModal({
        title: '版本更新',
        content: '当前微信版本过低，不能更新小程序最新版本，为了获得更好的体验，请您使用更高版本的微信版本！',
        confirmColor: "#5677FC",
        showCancel: false
      })
    }
  },
  memberLogin: function () {
    var that = this;
    wx.showLoading({
      title: '加载中',
      mask: true
    });
    wx.login({
      success: res => {
        // 发送 res.code 到后台换取 openId, sessionKey, unionId
        request.getRequest("member.login.php", { code: res.code }, res => {
          if (res.STS) {
            wx.hideLoading({});
            var member_info = res.DATA.member_info;
            wx.setStorageSync('member_id',member_info.uid);
            wx.setStorageSync('token', res.DATA.token);
            that.globalData.member_info = member_info;
          } else {
            wx.showModal({
              title: '提示',
              content: res.MSG,
              showCancel: false
            })
          }
        })
      },
      fail() {
        //console.log('获取用户登录态失败！' + res.errMsg);
        wx.showModal({
          title: '提示',
          content: '获取用户登录态失败！' + res.errMsg,
          showCancel: false
        })
      }
    })
  },
  checkToken: function (token) {
    var that = this;
    request.getRequest('member.check.token.php', { token: token }, function (res) {
      if (!res.STS) {
        console.log(res.MSG);
        that.memberLogin();
      }else{
         var memberInfo = res.DATA;
         that.globalData.member_info = memberInfo;
      }
    }, true);
  },

  updateMemberInfo: function (user_info) {
    var that = this;
    var token = wx.getStorageSync('token');
    var request_param = user_info;
    request_param.token = token;
    request.getRequest('member.update.info.php', request_param, function (res) {
      if (!res.STS) {
        console.log(res.MSG);
        wx.showModal({
          title: '提示',
          content: res.MSG,
          showCancel: false
        })
      } 
    }, true);
  },
  globalData: {
    userInfo: null,
    member_info: null
  },
  authSetting: false,
  config: config,
  request:request
});