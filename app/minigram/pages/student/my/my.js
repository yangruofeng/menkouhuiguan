// pages/student/my/my.js
Page({

	/**
	 * 页面的初始数据
	 */
	data: {
		select:0,
		tabbar:[]
	},

	/**
	 * 生命周期函数--监听页面加载
	 */
	onLoad: function (options) {
		this.setData({
			select:2,
			tabbar:getApp().student_tabbar
		});
	},
	tabChange:function(e) {
		//console.log('tab change', e)
		var index = e.detail.index;
		var url = '/'+this.data.tabbar[index].pagePath;
		wx.redirectTo({
		  url: url,
		});
    },

	/**
	 * 生命周期函数--监听页面初次渲染完成
	 */
	onReady: function () {

	},

	/**
	 * 生命周期函数--监听页面显示
	 */
	onShow: function () {
		
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