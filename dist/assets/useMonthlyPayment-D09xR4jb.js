import{m as o,p as t}from"./app-Bcl3sxZl.js";const h=(n,m,s)=>{const l=o(()=>{const e=t(n)?n.value:n,p=(t(m)?m.value:m)/100/12,c=(t(s)?s.value:s)*12;return e*p/(1-Math.pow(1+p,-c))}),a=o(()=>{const e=(t(s)?s.value:s)*12;return l.value*e}),u=o(()=>{const e=t(n)?n.value:n;return a.value-e});return{monthlyPayment:l,totalPaid:a,totalInterest:u}};export{h as u};