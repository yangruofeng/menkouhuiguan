//index.js
//获取应用实例
const app = getApp()

Page({
  data: {
    motto: 'Hello World',
    userInfo: {},
    hasUserInfo: false,
    canIUse: wx.canIUse('button.open-type.getUserInfo'),
    isAuth: false,
    tabbar: [{
      pagePath: "page/home0/index",
      selectedIconPath: '/resources/tabbar/homeh.png',
      iconPath: '/resources/tabbar/home.png',
      text: '首页A',
    }, {
      pagePath: "page/home1/index",
      selectedIconPath: '/resources/tabbar/kindh.png',
      iconPath: '/resources/tabbar/kind.png',
      text: '首页B',
    }, {
      pagePath: "page/home2/index",
      selectedIconPath: '/resources/tabbar/myh.png',
      iconPath: '/resources/tabbar/my.png',
      text: '首页C',
    }, {
      pagePath: "page/home3/index",
      selectedIconPath: '/resources/tabbar/shopcarth.png',
      iconPath: '/resources/tabbar/shopcart.png',
      text: '首页D',
    }]
  },
  //事件处理函数
  bindViewTap: function() {
    wx.navigateTo({
      url: '../logs/logs'
    })
  },
  onLoad: function () {
    var that = this;
    if (app.globalData.userInfo) {
       this.setPageUserInfo(app.globalData.userInfo);
    } else if (this.data.canIUse){
      // 由于 getUserInfo 是网络请求，可能会在 Page.onLoad 之后才返回
      // 所以此处加入 callback 以防止这种情况
      app.userInfoReadyCallback = res => {
          that.afterGetUserInfo(res.userInfo);
      }
    } else {
      // 在没有 open-type=getUserInfo 版本的兼容处理
      wx.getUserInfo({
        success: res => {
          that.afterGetUserInfo(res.userInfo);
        }
      })
    }
  },
  setPageUserInfo:function(userInfo){
    this.setData({
      userInfo: userInfo,
      hasUserInfo: true,
      isAuth:true
    });
  },
  afterGetUserInfo:function(userInfo)
  {
      var that = this;
      that.setPageUserInfo(userInfo);
      app.globalData.userInfo = userInfo;
      app.updateMemberInfo(userInfo);
  },
  getUserInfo: function(e) {
    console.log(e)
    var res = e.detail;
    if( res.userInfo ){
        // 允许
        this.afterGetUserInfo(res.userInfo);
    }else{
        // 拒绝 退出小程序
        console.log('reject');
        wx.navigateBack({
          delta: 2
      })
    }
   
  }
})
