(function(){!function(a){return a.widget("solrsearch.textinplace",{options:{form_name:null,revert_to:null},_create:function(){var b,c,d;return this.element.addClass("textinplace"),b=this._initFormName(),d=a.trim(this.element.text()),c=this.options.revert_to,null==c&&(c=d),this.element.html(""),this.hidden=a("<input type='hidden' name='"+b+"' value='"+d+"'\n   data-revertto='"+c+"'\n />"),this.div=a("<div class='valuewrap'>\n  <span class='value'>"+d+"</span>\n  <span class='icons'>\n    <i class='icon-pencil'></i>\n    <i class='icon-repeat'></i>\n  </span>\n</div>"),this.text=null,this.element.append(this.hidden),this.element.append(this.div),this._bindEvents()},_setOption:function(b,c){switch(b){case"revert_to":this.hidden.attr("data-revertto",c)}return a.Widget.prototype._setOption.apply(this,arguments)},destroy:function(){return this._destroy(),a.Widget.prototype.destroy.call(this)},_destroy:function(){},_initFormName:function(){var a;return null!=(a=this.options).form_name?(a=this.options).form_name:a.form_name=this.element.attr("id")},_escape:function(a){return a.replace(/\W/,"_").replace(/_+/,"_")},_bindEvents:function(){var a=this;return this.div.on("click",function(b){return a._click(b)}).find(".icon-repeat").click(function(b){return a._revert(),b.stopPropagation()})},_click:function(){return this.div.hide(),null==this.text&&(this.text=this._createTextInput()),this.text.show(),this.text.focus()},_revert:function(){var a;return a=this.hidden.attr("data-revertto"),this._setValue(a)},_createTextInput:function(){var b,c,d,e=this;return b=this.options.form_name+"_text",d=this.hidden.val(),c=a("<input type='text' name='"+b+"' value='"+d+"' form='' />"),this.element.append(c),c.blur(function(){return e._textDone()}),c.keyup(function(a){return"Enter"===a.key||13===a.keyCode?(e._textDone(),a.preventDefault(),a.stopImmediatePropagation(),a.stopPropagation()):void 0}),c},_textDone:function(){return this.text.hide(),this._setValue(this.text.val()),this.div.show()},_setValue:function(b){var c;return a(".value",this.div).html(b),null!=(c=this.text)&&c.val(b),this.hidden.attr("value",b)}})}(jQuery)}).call(this),jQuery(function(a){a("#facets-form").accordion({header:"h3.fieldset",autoHeight:!1,collapsible:!0,heightStyle:"content"})});