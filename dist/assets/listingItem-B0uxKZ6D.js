import{n as m,j as u,w as i,o as f,a as e,b as n,u as a,d,P as g}from"./app-_5HEVdpk.js";import{_ as p,a as x}from"./ListingAttribute-BqlamaoQ.js";import{B as h}from"./BoxShadow-CWPKlGK7.js";import{_ as l}from"./ListingPrice-CG4ivBKL.js";import{u as _}from"./useMonthlyPayment-Ct7srEub.js";const y={class:"flex justify-between"},w={class:"text-xs text-gray-500"},V={__name:"listingItem",props:{listing:{type:Object,required:!0}},setup(t){const o=t;m();const{monthlyPayment:r}=_(o.listing.price,2.5,25);return(c,s)=>(f(),u(h,null,{default:i(()=>[e(a(g),{href:c.route("listing.show",t.listing.id)},{default:i(()=>[n("div",y,[e(l,{price:t.listing.price,class:"text-2xl font-bold"},null,8,["price"]),n("div",w,[e(l,{price:a(r)},null,8,["price"]),s[0]||(s[0]=d(" / month "))])]),e(p,{listings:t.listing},null,8,["listings"]),e(x,{listing:t.listing,class:"text-gray-500"},null,8,["listing"])]),_:1},8,["href"])]),_:1}))}};export{V as default};
