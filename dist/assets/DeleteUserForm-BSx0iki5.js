import{_ as C,o as y,c as w,y as x,r as p,q as D,s as B,x as S,m as E,b as s,a as n,w as d,g as _,z as b,T as h,A as $,f as V,C as U,B as A,e as v,u as f,D as T}from"./app-Bcl3sxZl.js";import{_ as z}from"./InputError-uWcnEU2a.js";import{_ as M,a as N}from"./TextInput-DKd3_iAk.js";const O={},P={class:"inline-flex items-center rounded-md border border-transparent bg-red-600 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white transition duration-150 ease-in-out hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 active:bg-red-700"};function W(l,r){return y(),w("button",P,[x(l.$slots,"default")])}const k=C(O,[["render",W]]),F={class:"fixed inset-0 z-50 overflow-y-auto px-4 py-6 sm:px-0","scroll-region":""},I={__name:"Modal",props:{show:{type:Boolean,default:!1},maxWidth:{type:String,default:"2xl"},closeable:{type:Boolean,default:!0}},emits:["close"],setup(l,{emit:r}){const t=l,o=r,u=p(),i=p(t.show);D(()=>t.show,()=>{var a;t.show?(document.body.style.overflow="hidden",i.value=!0,(a=u.value)==null||a.showModal()):(document.body.style.overflow="",setTimeout(()=>{var m;(m=u.value)==null||m.close(),i.value=!1},200))});const c=()=>{t.closeable&&o("close")},g=a=>{a.key==="Escape"&&(a.preventDefault(),t.show&&c())};B(()=>document.addEventListener("keydown",g)),S(()=>{document.removeEventListener("keydown",g),document.body.style.overflow=""});const e=E(()=>({sm:"sm:max-w-sm",md:"sm:max-w-md",lg:"sm:max-w-lg",xl:"sm:max-w-xl","2xl":"sm:max-w-2xl"})[t.maxWidth]);return(a,m)=>(y(),w("dialog",{class:"z-50 m-0 min-h-full min-w-full overflow-y-auto bg-transparent backdrop:bg-transparent",ref_key:"dialog",ref:u},[s("div",F,[n(h,{"enter-active-class":"ease-out duration-300","enter-from-class":"opacity-0","enter-to-class":"opacity-100","leave-active-class":"ease-in duration-200","leave-from-class":"opacity-100","leave-to-class":"opacity-0"},{default:d(()=>[_(s("div",{class:"fixed inset-0 transform transition-all",onClick:c},m[0]||(m[0]=[s("div",{class:"absolute inset-0 bg-gray-500 opacity-75"},null,-1)]),512),[[b,l.show]])]),_:1}),n(h,{"enter-active-class":"ease-out duration-300","enter-from-class":"opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95","enter-to-class":"opacity-100 translate-y-0 sm:scale-100","leave-active-class":"ease-in duration-200","leave-from-class":"opacity-100 translate-y-0 sm:scale-100","leave-to-class":"opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"},{default:d(()=>[_(s("div",{class:$(["mb-6 transform overflow-hidden rounded-lg bg-white shadow-xl transition-all sm:mx-auto sm:w-full",e.value])},[i.value?x(a.$slots,"default",{key:0}):V("",!0)],2),[[b,l.show]])]),_:3})])],512))}},K=["type"],L={__name:"SecondaryButton",props:{type:{type:String,default:"button"}},setup(l){return(r,t)=>(y(),w("button",{type:l.type,class:"inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-xs font-semibold uppercase tracking-widest text-gray-700 shadow-sm transition duration-150 ease-in-out hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25"},[x(r.$slots,"default")],8,K))}},j={class:"space-y-6"},q={class:"p-6"},G={class:"mt-6"},H={class:"mt-6 flex justify-end"},X={__name:"DeleteUserForm",setup(l){const r=p(!1),t=p(null),o=U({password:""}),u=()=>{r.value=!0,A(()=>t.value.focus())},i=()=>{o.delete(route("profile.destroy"),{preserveScroll:!0,onSuccess:()=>c(),onError:()=>t.value.focus(),onFinish:()=>o.reset()})},c=()=>{r.value=!1,o.clearErrors(),o.reset()};return(g,e)=>(y(),w("section",j,[e[6]||(e[6]=s("header",null,[s("h2",{class:"text-lg font-medium text-gray-900"}," Delete Account "),s("p",{class:"mt-1 text-sm text-gray-600"}," Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain. ")],-1)),n(k,{onClick:u},{default:d(()=>e[1]||(e[1]=[v("Delete Account")])),_:1}),n(I,{show:r.value,onClose:c},{default:d(()=>[s("div",q,[e[4]||(e[4]=s("h2",{class:"text-lg font-medium text-gray-900"}," Are you sure you want to delete your account? ",-1)),e[5]||(e[5]=s("p",{class:"mt-1 text-sm text-gray-600"}," Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account. ",-1)),s("div",G,[n(M,{for:"password",value:"Password",class:"sr-only"}),n(N,{id:"password",ref_key:"passwordInput",ref:t,modelValue:f(o).password,"onUpdate:modelValue":e[0]||(e[0]=a=>f(o).password=a),type:"password",class:"mt-1 block w-3/4",placeholder:"Password",onKeyup:T(i,["enter"])},null,8,["modelValue"]),n(z,{message:f(o).errors.password,class:"mt-2"},null,8,["message"])]),s("div",H,[n(L,{onClick:c},{default:d(()=>e[2]||(e[2]=[v(" Cancel ")])),_:1}),n(k,{class:$(["ms-3",{"opacity-25":f(o).processing}]),disabled:f(o).processing,onClick:i},{default:d(()=>e[3]||(e[3]=[v(" Delete Account ")])),_:1},8,["class","disabled"])])])]),_:1},8,["show"])]))}};export{X as default};
