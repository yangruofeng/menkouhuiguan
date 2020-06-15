const config = require("../config.js");
const rootDocment = config.rootDocment;
const header = {
    'Accept': 'application/json',
    'content-type': 'application/json',
    'Authorization': null,
};

function getRequest(url,data, cb, isShowLoading = true) {
    if (isShowLoading) {
        wx.showLoading({
            title: '加载中',
        })
    }
    wx.request({
        url: rootDocment + url,
        method: 'get',
        header: header,
        data: data,
        success: function(res) {
            if (isShowLoading) {
                wx.hideLoading()
            }

            return typeof cb == "function" && cb(res.data)
        },
        fail: function() {
            if (isShowLoading) {
                wx.hideLoading()
            }
            wx.showModal({
                title: '网络错误',
                content: '网络出错，请刷新重试',
                showCancel: false
            });
            //return typeof cb == "function" && cb(false)
        }
    })
}

function postRequest(url, data, cb, isShowLoading = true) {
    if (isShowLoading) {
        wx.showLoading({
            title: '加载中',
        })
    }
    //post必须修改
    header['content-type'] = 'application/x-www-form-urlencoded';
    wx.request({
        url: rootDocment + url,
        header: header,
        data: data,
        method: 'post',
        success: function(res) {
            if (isShowLoading) {
                wx.hideLoading()
            }

            return typeof cb == "function" && cb(res.data)
        },
        fail: function() {
            if (isShowLoading) {
                wx.hideLoading()
            }
            wx.showModal({
                title: '网络错误',
                content: '网络出错，请刷新重试',
                showCancel: false
            });
            //return typeof cb == "function" && cb(false)
        }
    })
}
module.exports = {
    getRequest: getRequest,
    postRequest: postRequest,
    header: header,
};