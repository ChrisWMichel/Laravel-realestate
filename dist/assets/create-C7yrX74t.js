import{G as V,n as W,l as U,C as z,c as C,a as B,u as I,w as P,j as F,e as L,o as b,m as D,b as d,F as M,i as O,t as A,g as G,d as _,P as H}from"./app-_5HEVdpk.js";import{B as j}from"./BoxShadow-CWPKlGK7.js";import{d as J}from"./index-BZwz0dzK.js";var N={exports:{}};/* NProgress, (c) 2013, 2014 Rico Sta. Cruz - http://ricostacruz.com/nprogress
 * @license MIT */var K=N.exports,R;function Q(){return R||(R=1,function(h,q){(function(r,n){h.exports=n()})(K,function(){var r={};r.version="0.2.0";var n=r.settings={minimum:.08,easing:"ease",positionUsing:"",speed:200,trickle:!0,trickleRate:.02,trickleSpeed:800,showSpinner:!0,barSelector:'[role="bar"]',spinnerSelector:'[role="spinner"]',parent:"body",template:'<div class="bar" role="bar"><div class="peg"></div></div><div class="spinner" role="spinner"><div class="spinner-icon"></div></div>'};r.configure=function(e){var t,s;for(t in e)s=e[t],s!==void 0&&e.hasOwnProperty(t)&&(n[t]=s);return this},r.status=null,r.set=function(e){var t=r.isStarted();e=f(e,n.minimum,1),r.status=e===1?null:e;var s=r.render(!t),o=s.querySelector(n.barSelector),l=n.speed,m=n.easing;return s.offsetWidth,T(function(i){n.positionUsing===""&&(n.positionUsing=r.getPositioningCSS()),v(o,E(e,l,m)),e===1?(v(s,{transition:"none",opacity:1}),s.offsetWidth,setTimeout(function(){v(s,{transition:"all "+l+"ms linear",opacity:0}),setTimeout(function(){r.remove(),i()},l)},l)):setTimeout(i,l)}),this},r.isStarted=function(){return typeof r.status=="number"},r.start=function(){r.status||r.set(0);var e=function(){setTimeout(function(){r.status&&(r.trickle(),e())},n.trickleSpeed)};return n.trickle&&e(),this},r.done=function(e){return!e&&!r.status?this:r.inc(.3+.5*Math.random()).set(1)},r.inc=function(e){var t=r.status;return t?(typeof e!="number"&&(e=(1-t)*f(Math.random()*t,.1,.95)),t=f(t+e,0,.994),r.set(t)):r.start()},r.trickle=function(){return r.inc(Math.random()*n.trickleRate)},function(){var e=0,t=0;r.promise=function(s){return!s||s.state()==="resolved"?this:(t===0&&r.start(),e++,t++,s.always(function(){t--,t===0?(e=0,r.done()):r.set((e-t)/e)}),this)}}(),r.render=function(e){if(r.isRendered())return document.getElementById("nprogress");p(document.documentElement,"nprogress-busy");var t=document.createElement("div");t.id="nprogress",t.innerHTML=n.template;var s=t.querySelector(n.barSelector),o=e?"-100":S(r.status||0),l=document.querySelector(n.parent),m;return v(s,{transition:"all 0 linear",transform:"translate3d("+o+"%,0,0)"}),n.showSpinner||(m=t.querySelector(n.spinnerSelector),m&&x(m)),l!=document.body&&p(l,"nprogress-custom-parent"),l.appendChild(t),t},r.remove=function(){a(document.documentElement,"nprogress-busy"),a(document.querySelector(n.parent),"nprogress-custom-parent");var e=document.getElementById("nprogress");e&&x(e)},r.isRendered=function(){return!!document.getElementById("nprogress")},r.getPositioningCSS=function(){var e=document.body.style,t="WebkitTransform"in e?"Webkit":"MozTransform"in e?"Moz":"msTransform"in e?"ms":"OTransform"in e?"O":"";return t+"Perspective"in e?"translate3d":t+"Transform"in e?"translate":"margin"};function f(e,t,s){return e<t?t:e>s?s:e}function S(e){return(-1+e)*100}function E(e,t,s){var o;return n.positionUsing==="translate3d"?o={transform:"translate3d("+S(e)+"%,0,0)"}:n.positionUsing==="translate"?o={transform:"translate("+S(e)+"%,0)"}:o={"margin-left":S(e)+"%"},o.transition="all "+t+"ms "+s,o}var T=function(){var e=[];function t(){var s=e.shift();s&&s(t)}return function(s){e.push(s),e.length==1&&t()}}(),v=function(){var e=["Webkit","O","Moz","ms"],t={};function s(i){return i.replace(/^-ms-/,"ms-").replace(/-([\da-z])/gi,function(u,c){return c.toUpperCase()})}function o(i){var u=document.body.style;if(i in u)return i;for(var c=e.length,k=i.charAt(0).toUpperCase()+i.slice(1),y;c--;)if(y=e[c]+k,y in u)return y;return i}function l(i){return i=s(i),t[i]||(t[i]=o(i))}function m(i,u,c){u=l(u),i.style[u]=c}return function(i,u){var c=arguments,k,y;if(c.length==2)for(k in u)y=u[k],y!==void 0&&u.hasOwnProperty(k)&&m(i,k,y);else m(i,c[1],c[2])}}();function w(e,t){var s=typeof e=="string"?e:g(e);return s.indexOf(" "+t+" ")>=0}function p(e,t){var s=g(e),o=s+t;w(s,t)||(e.className=o.substring(1))}function a(e,t){var s=g(e),o;w(e,t)&&(o=s.replace(" "+t+" "," "),e.className=o.substring(1,o.length-1))}function g(e){return(" "+(e.className||"")+" ").replace(/\s+/gi," ")}function x(e){e&&e.parentNode&&e.parentNode.removeChild(e)}return r})}(N)),N.exports}var X=Q();const Y=V(X),Z=["value"],$={class:"flex items-center mt-4 space-x-4"},ee=["disabled"],te={key:0,class:"mt-2 text-red-500 input-error"},re={class:"grid grid-cols-3 gap-4 mt-4"},se=["src"],ae={__name:"create",props:{listing:{type:Object}},setup(h){const q=h;J.Inertia.on("progress",p=>{p.detail.progress.percentage&&Y.set(p.detail.progress.percentage/100*.9)});const r=W(),n=U(()=>r.props.csrf),f=z({images:[]}),S=()=>{f.post(route("realtor.listing.image.store",q.listing.id))},E=U(()=>f.images.length>0),T=p=>{f.images=p.target.files},v=U(()=>Object.values(f.errors)),w=()=>{f.reset()};return(p,a)=>(b(),C("div",null,[B(I(D),{title:"Upload Images"}),B(j,{class:"p-4"},{default:P(()=>[a[0]||(a[0]=d("div",{class:"text-2xl font-semibold text-gray-200"}," Upload Images ",-1)),a[1]||(a[1]=d("p",{class:"text-gray-400"},"Upload images for the listing",-1)),d("form",{onSubmit:G(S,["prevent"])},[d("input",{type:"hidden",name:"_token",value:n.value},null,8,Z),d("section",$,[d("input",{class:"font-semibold border border-gray-200 rounded-md file:px-4 file:py-2 file:border-0 file:bg-gray-100 file:rounded-md file:cursor-pointer file:hover:bg-gray-200 file:hover:cursor-pointer",type:"file",required:"",multiple:"",onInput:T},null,32),d("button",{type:"submit",disabled:!E.value,class:"btn-outline disabled:opacity-50 disabled:cursor-not-allowed"}," Upload ",8,ee),d("button",{type:"reset",onClick:w,class:"btn-outline"}," Reset ")]),v.value.length>0?(b(),C("div",te,[(b(!0),C(M,null,O(v.value,(g,x)=>(b(),C("div",{key:x},A(g),1))),128))])):L("",!0)],32)]),_:1}),h.listing.images.length>0?(b(),F(j,{key:0,class:"p-4 mt-4"},{header:P(()=>a[2]||(a[2]=[_("Current Listing Images")])),default:P(()=>[d("section",re,[(b(!0),C(M,null,O(h.listing.images,(g,x)=>(b(),C("div",{key:x,class:"relative flex flex-col justify-between"},[d("img",{src:g.path,alt:"Listing Image",class:"object-cover w-full h-40 rounded-md"},null,8,se),B(I(H),{href:p.route("realtor.listing.image.destroy",[h.listing.id,g.id]),method:"delete",as:"button",class:"absolute p-1 text-white bg-red-500 rounded-md top-2 right-2"},{default:P(()=>a[3]||(a[3]=[_(" Delete ")])),_:2},1032,["href"])]))),128))])]),_:1})):L("",!0)]))}};export{ae as default};
