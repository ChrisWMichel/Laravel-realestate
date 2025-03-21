import{r as g,n as $,l as I,c as p,a as s,u,b as t,w as n,j as c,e as v,o as a,m as N,d as b,t as w,f as k,v as h,F as T,i as D}from"./app-_5HEVdpk.js";import{B as y}from"./BoxShadow-CWPKlGK7.js";import{_ as O,a as U}from"./ListingAttribute-BqlamaoQ.js";import{_ as o}from"./ListingPrice-CG4ivBKL.js";import C from"./makeOffer-DASfXfMP.js";import F from"./offerMade-_cYc2-Oj.js";import{u as R}from"./useMonthlyPayment-Ct7srEub.js";import{_ as S}from"./emptyState-quK7EwOK.js";import"./lodash-BwBNciJF.js";const E={class:"flex flex-col gap-4 md:grid md:grid-cols-12"},L={class:"flex flex-col gap-4 md:col-span-5"},Y={class:"label-style"},_={class:"label-style"},q={class:"mt-2 text-gray-600 dark:text-gray-400"},z={class:"mt-2 text-gray-400"},A={class:"flex justify-between"},G={class:"flex justify-between"},H={class:"flex justify-between"},J={class:"grid w-full grid-cols-1 gap-1 md:grid-cols-2"},K=["src","alt"],ne={__name:"show",props:{listing:{type:Object},offerMade:{type:Object}},setup(l){const r=g(2.5),d=g(25),x=g(l.listing.price),{monthlyPayment:M,totalPaid:j,totalInterest:B}=R(x,r,d),P=$(),f=I(()=>{var m,e;return((e=(m=P.props)==null?void 0:m.auth)==null?void 0:e.user)||null});return(m,e)=>(a(),p("div",null,[s(u(N),{title:l.listing.city},null,8,["title"]),t("div",E,[t("div",L,[s(y,null,{header:n(()=>e[3]||(e[3]=[t("h1",{class:"text-2xl font-bold"},"Basic info",-1)])),default:n(()=>[s(o,{price:l.listing.price,class:"text-2xl font-bold"},null,8,["price"]),s(O,{listings:l.listing},null,8,["listings"]),s(U,{listing:l.listing,class:"text-gray-500"},null,8,["listing"])]),_:1}),s(y,null,{header:n(()=>e[4]||(e[4]=[b(" Monthly Payment ")])),default:n(()=>[t("div",null,[t("label",Y,"Interest Rate ("+w(r.value)+"%)",1),k(t("input",{"onUpdate:modelValue":e[0]||(e[0]=i=>r.value=i),type:"range",class:"w-full h-4 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-500",min:"0.1",max:"30",step:"0.1"},null,512),[[h,r.value,void 0,{number:!0}]]),t("label",_,"Duration ("+w(d.value)+" years)",1),k(t("input",{"onUpdate:modelValue":e[1]||(e[1]=i=>d.value=i),type:"range",class:"w-full h-4 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-500",min:"5",max:"35",step:"5"},null,512),[[h,d.value,void 0,{number:!0}]])]),t("div",q,[e[5]||(e[5]=t("div",{class:"text-gray-400"},"Your monthly payment",-1)),s(o,{price:u(M),class:"text-2xl font-bold"},null,8,["price"])]),t("div",z,[t("div",A,[e[6]||(e[6]=t("div",null,"Total Paid",-1)),s(o,{price:u(j),class:"text-2xl font-bold"},null,8,["price"])]),t("div",G,[e[7]||(e[7]=t("div",null,"Principal Paid",-1)),s(o,{price:l.listing.price,class:"text-2xl font-bold"},null,8,["price"])]),t("div",H,[e[8]||(e[8]=t("div",null,"Total Interest",-1)),s(o,{price:u(B),class:"text-2xl font-bold"},null,8,["price"])])])]),_:1}),f.value&&!l.offerMade&&f.value.id!==l.listing.by_user_id?(a(),c(C,{key:0,onOfferUpdated:e[2]||(e[2]=i=>x.value=i),price:l.listing.price,listingId:l.listing.id},null,8,["price","listingId"])):v("",!0),f.value&&l.offerMade?(a(),c(F,{key:1,offerMade:l.offerMade},null,8,["offerMade"])):v("",!0)]),l.listing.images.length>0?(a(),c(y,{key:0,class:"flex items-center w-full md:col-span-7"},{default:n(()=>[t("div",J,[(a(!0),p(T,null,D(l.listing.images,(i,V)=>(a(),p("img",{key:V,src:i.path,alt:l.listing.city,class:"object-cover w-full h-96"},null,8,K))),128))])]),_:1})):(a(),c(S,{key:1,class:"flex items-center w-full md:col-span-7"},{default:n(()=>e[9]||(e[9]=[b(" No images available ")])),_:1}))])]))}};export{ne as default};
