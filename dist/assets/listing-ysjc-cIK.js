import{n as m,j as f,w as i,o as u,a as s,b as n,u as a,e as g,P as d}from"./app-Bcl3sxZl.js";import{_ as p,a as x}from"./ListingAttribute-DPzv17GN.js";import{B as h}from"./BoxShadow-Mn9PeRF2.js";import{_ as l}from"./ListingPrice-B5FVmY4O.js";import{u as _}from"./useMonthlyPayment-D09xR4jb.js";const y={class:"flex justify-between"},w={class:"text-xs text-gray-500"},V={__name:"listing",props:{listing:{type:Object}},setup(t){const o=t;m();const{monthlyPayment:r}=_(o.listing.price,2.5,25);return(c,e)=>(u(),f(h,null,{default:i(()=>[s(a(d),{href:c.route("listing.show",t.listing.id)},{default:i(()=>[n("div",y,[s(l,{price:t.listing.price,class:"text-2xl font-bold"},null,8,["price"]),n("div",w,[s(l,{price:a(r)},null,8,["price"]),e[0]||(e[0]=g(" / month "))])]),s(p,{listings:t.listing},null,8,["listings"]),s(x,{listing:t.listing,class:"text-gray-500"},null,8,["listing"])]),_:1},8,["href"])]),_:1}))}};export{V as default};
