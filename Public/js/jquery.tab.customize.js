;(function($){
  $.fn.tab = function(options){
    var defaults={
      //各种参数及属性
      oddRowClass:'oddRow',
      evenRowClass:'evenRow',
      currRowClass:'currRow',
      etype:'mouseover',
      etype2:'mouseout'
    }
    var options=$.extend(defaults,options);
    this.each(function(){
    	var _this=$(this);
      //实现功能的代码
      _this.find('tr:odd').addClass(options.oddRowClass);
      _this.find('tr:even').addClass(options.evenRowClass);
      //_this.find('tr').mouseover(function(){
      // 	$(this).addClass(options.currRowClass)
      // }).mouseout(function(){
      // 	$(this).removeClass(options.currRowClass)
      // });  
      //下面是优化写法：
      _this.find('tr').bind(options.etype,function(){
      	$(this).addClass(options.currRowClass); 
      })
      _this.find('tr').bind(options.etype2,function(){
      	$(this).removeClass(options.currRowClass); 
      })       

    })
  }
})(jQuery);