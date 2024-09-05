!function(n){"use strict";function t(){this.$body=n("body"),this.$realData=[]}t.prototype.createPlotGraph=function(t,a,e,o,r,l,i){n.plot(n(t),[{data:a,label:o[0],color:r[0]},{data:e,label:o[1],color:r[1]}],{series:{lines:{show:!0,fill:!0,lineWidth:2,fillColor:{colors:[{opacity:.5},{opacity:.5}]}},points:{show:!1},shadowSize:0},legend:{position:"nw",backgroundColor:"transparent"},grid:{hoverable:!0,clickable:!0,borderColor:l,borderWidth:1,labelMargin:10,backgroundColor:i},yaxis:{min:0,max:15,color:"rgba(255, 255, 255, 0.1)",font:{color:"#bdbdbd"}},xaxis:{color:"rgba(255, 255, 255, 0.1)",font:{color:"#bdbdbd"}},tooltip:!0,tooltipOpts:{content:"%s: Value of %x is %y",shifts:{x:-60,y:25},defaultTheme:!1}})},t.prototype.createPieGraph=function(t,a,e,o){e=[{label:a[0],data:e[0]},{label:a[1],data:e[1]},{label:a[2],data:e[2]}],o={series:{pie:{show:!0}},legend:{show:!0,backgroundColor:"transparent"},grid:{hoverable:!0,clickable:!0},colors:o,tooltip:!0,tooltipOpts:{content:"%s, %p.0%"}};n.plot(n(t),e,o)},t.prototype.randomData=function(){for(0<this.$realData.length&&(this.$realData=this.$realData.slice(1));this.$realData.length<300;){var t=(0<this.$realData.length?this.$realData[this.$realData.length-1]:50)+10*Math.random()-5;t<0?t=0:100<t&&(t=100),this.$realData.push(t)}for(var a=[],e=0;e<this.$realData.length;++e)a.push([e,this.$realData[e]]);return a},t.prototype.createRealTimeGraph=function(t,a,e){return n.plot(t,[a],{colors:e,series:{lines:{show:!0,fill:!0,lineWidth:2,fillColor:{colors:[{opacity:.45},{opacity:.45}]}},points:{show:!1},shadowSize:0},grid:{show:!0,aboveData:!1,color:"#dcdcdc",labelMargin:15,axisMargin:0,borderWidth:0,borderColor:null,minBorderMargin:5,clickable:!0,hoverable:!0,autoHighlight:!1,mouseActiveRadius:20},tooltip:!0,tooltipOpts:{content:"Value is : %y.0%",shifts:{x:-30,y:-50}},yaxis:{min:0,max:100,color:"rgba(255, 255, 255, 0.1)",font:{color:"#bdbdbd"}},xaxis:{show:!1}})},t.prototype.createDonutGraph=function(t,a,e,o){e=[{label:a[0],data:e[0]},{label:a[1],data:e[1]},{label:a[2],data:e[2]},{label:a[3],data:e[3]},{label:a[4],data:e[4]}],o={series:{pie:{show:!0,innerRadius:.7}},legend:{show:!0,backgroundColor:"transparent",labelFormatter:function(t,a){return'<div style="font-size:14px;">&nbsp;'+t+"</div>"},labelBoxBorderColor:null,margin:50,width:20,padding:1},grid:{hoverable:!0,clickable:!0},colors:o,tooltip:!0,tooltipOpts:{content:"%s, %p.0%"}};n.plot(n(t),e,o)},t.prototype.init=function(){this.createPlotGraph("#website-stats",[[0,9],[1,8],[2,5],[3,8],[4,5],[5,14],[6,10]],[[0,5],[1,12],[2,4],[3,3],[4,12],[5,8],[6,4]],["Marketplace","Other Market"],["#2ebbc8","#58d6c9"],"transparent","transparent");this.createPieGraph("#pie-chart #pie-chart-container",["Marketplace","Other Market","Direct Sales"],[20,30,15],["#2ebbc8","#98d4ce","#e6edf3"]);var a=this.createRealTimeGraph("#flotRealTime",this.randomData(),["#2ebbc8"]);a.draw();var e=this;!function t(){a.setData([e.randomData()]),a.draw(),setTimeout(t,(n("html").hasClass("mobile-device"),1e3))}();this.createDonutGraph("#donut-chart #donut-chart-container",["Marketplace","Other Market","Direct Sales"],[29,20,18],["#2ebbc8","#98d4ce","#e6edf3"])},n.FlotChart=new t,n.FlotChart.Constructor=t}(window.jQuery),function(){"use strict";window.jQuery.FlotChart.init()}();