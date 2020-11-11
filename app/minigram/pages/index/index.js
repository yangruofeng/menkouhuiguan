//index.js
//获取应用实例
const app = getApp();

Page({
  data: {
    motto: '门口绘馆',
    userInfo: null,
    canIUse: wx.canIUse('button.open-type.getUserInfo'),
    isAuth: false
  },
  //事件处理函数
  bindViewTap: function() {
    wx.navigateTo({
      url: '../logs/logs'
    })
  },
  onLoad: function () {
    //console.log(app);
    var that = this;
    app.getUserInfo(function(userInfo){
        console.log(userInfo);
        if( userInfo ){
          that.setPageUserInfo(userInfo);
        }else{
            if( that.data.canIUse ){

            }else{
                // 在没有 open-type=getUserInfo 版本的兼容处理
                wx.getUserInfo({
                  success: res => {
                    that.afterGetUserInfo(res.userInfo);
                  }
                })
            }
        }
    });
  },
  onShow:function(){
    console.log(this.data);
    // if (typeof this.getTabBar === 'function' &&
    //   this.getTabBar()) {
    //   this.getTabBar().setData({
    //     selected: 0,
    //     list: [
    //       {
    //         "pagePath": "/pages/index/index",
    //         "iconPath": "/images/icon_component.png",
    //         "selectedIconPath": "/images/icon_component_HL.png",
    //         "text": "组件"
    //       },
    //       {
    //         "pagePath": "/pages/test/test",
    //         "iconPath": "/images/icon_API.png",
    //         "selectedIconPath": "/images/icon_API_HL.png",
    //         "text": "接口"
    //       },
    //       {
    //         "pagePath": "/pages/test/test",
    //         "iconPath": "/images/icon_API.png",
    //         "selectedIconPath": "/images/icon_API_HL.png",
    //         "text": "接口"
    //       }
    //       ]
    //   });
    // }
  },
  setPageUserInfo:function(userInfo){
    this.setData({
      userInfo: userInfo,
      isAuth:true
    });
  },
  afterGetUserInfo:function(userInfo)
  {
      var that = this;
      that.setPageUserInfo(userInfo);
      app.userInfoReadyCallback(userInfo);
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
        try{
          // wx.navigateBack({
          //   delta: 2
          // })
          wx.showModal({
            title: '提示',
            content: '为了您更好的体验，请允许授权获得您的公开信息！',
            showCancel: false
        });
        }catch( ex ){

        }
       
    }
   
  }
})
