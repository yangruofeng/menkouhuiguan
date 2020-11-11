// pages/test/test.js
Page({

	/**
	 * 页面的初始数据
	 */
	data: {

	},

	/**
	 * 生命周期函数--监听页面加载
	 */
	onLoad: function (options) {

	},

	/**
	 * 生命周期函数--监听页面初次渲染完成
	 */
	onReady: function () {

	},

	/**
	 * 生命周期函数--监听页面显示
	 */
	onShow:function(){
		if (typeof this.getTabBar === 'function' &&
		  this.getTabBar()) {
		  this.getTabBar().setData({
			selected: 1,
			list: [
			  {
				"pagePath": "/pages/index/index",
				"iconPath": "/images/icon_component.png",
				"selectedIconPath": "/images/icon_component_HL.png",
				"text": "组件"
			  },
			  {
				"pagePath": "/pages/test/test",
				"iconPath": "/images/icon_API.png",
				"selectedIconPath": "/images/icon_API_HL.png",
				"text": "接口"
			  },
			  {
				"pagePath": "/pages/test/test",
				"iconPath": "/images/icon_API.png",
				"selectedIconPath": "/images/icon_API_HL.png",
				"text": "接口"
			  }
			  ]
		  });
		}
	  },
	/**
	 * 生命周期函数--监听页面隐藏
	 */
	onHide: function () {

	},

	/**
	 * 生命周期函数--监听页面卸载
	 */
	onUnload: function () {

	},

	/**
	 * 页面相关事件处理函数--监听用户下拉动作
	 */
	onPullDownRefresh: function () {

	},

	/**
	 * 页面上拉触底事件的处理函数
	 */
	onReachBottom: function () {

	},

	/**
	 * 用户点击右上角分享
	 */
	onShareAppMessage: function () {

	}
})