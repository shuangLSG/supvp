;
(function (mui, $) {
    "use strict"
    var _global;

    // 构造方法 初始化 setting
    function extend(o,n,override) {
        for(var key in n){
        if(n.hasOwnProperty(key) && (!o.hasOwnProperty(key) || override)){
            o[key]=n[key];
        }
        }
        return o;
    };
    function CustomPlugin() {
  
        this.init();
        this.showCapital(this.ajaxData);
    }

    CustomPlugin.prototype = {
        constructor: this,
        ajaxData:{},
        init:function(opt){
            var def = {};
            this.def = extend(def,opt,true); //配置参数    
            this.getAjax();                         
        },
        getAjax:function(){
            $.ajaxSetup({
                async: false
            });
            var _this = this;
            $.post('../address/getCity', {}, function (res) {
                if (res.s == 200) {
                    var data= res.d;
                    data.City = _this.setTree(res.d.City)
                    _this.ajaxData = data;
                   console.log(_this.ajaxData)
                }
            }, 'json');
        },
        creatDom:function(data){
            var html="<ul>";
            data.forEach((item,index) => {
                html+=`<li data-id="${item.id}" data-parent="${item.capitalid?item.capitalid:''}" class="mui-text-center font-purple text-size-15 ${index==0?'active':''}">${item.name}</li>`
            });
            html+='</ul>';
            return html;
        },
        showCapital:function(data){
            var capitalHtml= this.creatDom(data.Capital);
            $('#capitailControls .mui-scroll').html(capitalHtml);  
            // console.log(capitalHtml)
            this.showCity(data.Capital[0].id,data);
        },
        showCity:function(id,data){
            var cityData=[];
            data.City.forEach(item=>{
                if(item.capitalid == id){
                    cityData = item
                }
            });
            var cityHtml= this.creatDom(cityData.children);
            $('#cityControls .mui-scroll').html(cityHtml);
        },
        setTree:function(old){
            var hash = {};
            var i = 0;
            var res = [];
            old.forEach(function (item,i) {
                var capitalid = item.capitalid;
                if(hash[capitalid]){
                    res[hash[capitalid]-1].children.push(item); 
                }else{
                    hash[capitalid] = ++i &&res.push({
                        capitalid: capitalid,
                        children: [item],
                    })
                }
            });
            return res;
        },
        route: function (url) {
            mui.openWindow({
                url: url
            });
        },
        
    }

    // 将插件对象暴露给全局对象（考虑兼容性）
    _global = (function(){ return this || (0, eval)('this'); }());
    if (typeof module !== "undefined" && module.exports) {
        module.exports = CustomPlugin;
    } else if (typeof define === "function" && define.amd) {
        define(function(){return CustomPlugin;});
    } else {
        !('CustomPlugin' in _global) && (_global.CustomPlugin = CustomPlugin);
    }
    window.CustomPlugin = CustomPlugin;
})(mui, jQuery);