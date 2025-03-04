import{C as w,l as s,p as y,c as k,a as u,w as i,o as h,b as t,g as M,f as d,v as m,u as n}from"./app-DZuH0l-K.js";import{B}from"./BoxShadow-C0PT3EVi.js";import{_ as N}from"./ListingPrice-DD39zyPf.js";import{l as O}from"./lodash-BjHVDhBn.js";const S=["min","max"],U={class:"flex justify-between mt-2 text-gray-500"},D={__name:"makeOffer",props:{listingId:Number,price:Number},emits:["offerUpdated"],setup(p,{emit:f}){const o=p,r=w({amount:o.price}),c=()=>r.post(route("listing.offer.store",{listing:o.listingId}),{preserveScroll:!0,preserveState:!0}),b=s(()=>r.amount-o.price),x=s(()=>Math.round(o.price/2)),g=s(()=>Math.round(o.price*2)),v=f;return y(()=>r.amount,O.debounce(l=>{v("offerUpdated",l)},1e3)),(l,e)=>(h(),k("div",null,[u(B,null,{header:i(()=>e[2]||(e[2]=[t("h1",{class:"text-2xl font-bold"},"Make Offer",-1)])),default:i(()=>[t("div",null,[t("form",{onSubmit:M(c,["prevent"])},[d(t("input",{"onUpdate:modelValue":e[0]||(e[0]=a=>n(r).amount=a),type:"text",class:"w-full p-2 text-gray-600 border border-gray-600 rounded-lg",placeholder:"Enter your offer"},null,512),[[m,n(r).amount,void 0,{number:!0}]]),d(t("input",{"onUpdate:modelValue":e[1]||(e[1]=a=>n(r).amount=a),type:"range",class:"w-full h-4 mt-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-500",min:x.value,max:g.value,step:"10000"},null,8,S),[[m,n(r).amount,void 0,{number:!0}]]),e[3]||(e[3]=t("button",{type:"submit",class:"w-full p-2 mt-2 text-white bg-blue-500 rounded-lg"}," Make Offer ",-1))],32)]),t("div",U,[e[4]||(e[4]=t("div",null,"Difference",-1)),t("div",null,[u(N,{price:b.value,class:"text-2xl font-bold"},null,8,["price"])])])]),_:1})]))}};export{D as default};
