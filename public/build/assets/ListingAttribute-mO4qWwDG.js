import{o as a,c as l,t as s,b as n,d as i}from"./app-BgXsYvI_.js";const o={__name:"ListingAddress",props:{listing:{type:Object}},setup(t){return(r,e)=>(a(),l("span",null,s(t.listing.street)+" "+s(t.listing.street_nr)+", "+s(t.listing.city),1))}},c={class:"text-lg font-bold"},d={__name:"ListingAttribute",props:{listings:{type:Object}},setup(t){return(r,e)=>(a(),l("div",null,[n("span",c,[i(s(t.listings.beds)+" bds ",1),e[0]||(e[0]=n("span",{class:"text-gray-400"},"|",-1)),i("  "+s(t.listings.baths)+" ba ",1),e[1]||(e[1]=n("span",{class:"text-gray-400"},"|",-1)),i("  "+s(t.listings.area)+" sqft ",1)])]))}};export{d as _,o as a};
