//app.js
const request = require('/utils/request.js');
const config = require("/config.js");
App({
  onLaunch: function () {
    // 展示本地存储能力
    var token = wx.getStorageSync('token');
    console.log(token);
    if (!token) {
      this.memberLogin();
    } else {
      // 检查token过期
      this.checkToken(token);
    }

    // 获取用户信息
    wx.getSetting({
      success: res => {
        if (res.authSetting['scope.userInfo']) {
          // 已经授权，可以直接调用 getUserInfo 获取头像昵称，不会弹框
          wx.getUserInfo({
            success: res => {
              // 可以将 res 发送给后台解码出 unionId
              this.globalData.userInfo = res.userInfo;
              this.updateMemberInfo(res.userInfo);
              // 由于 getUserInfo 是网络请求，可能会在 Page.onLoad 之后才返回
              // 所以此处加入 callback 以防止这种情况
              if (this.userInfoReadyCallback) {
                this.userInfoReadyCallback(res)
              }
            }
          })
        }
      }
    })
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
            wx.setStorageSync('token', res.DATA.token);
            var member_info = res.DATA.member_info;
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
      }
    }, true);
  },

  updateMemberInfo: function (user_info) {
    var that = this;
    if (that.is_updated_member_info == 0) {
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
        } else {
          that.is_updated_member_info = 1;
        }
      }, true);
    }
    

  },
  globalData: {
    userInfo: null,
    member_info: null
  },
  config: config,
  is_updated_member_info: 0
});