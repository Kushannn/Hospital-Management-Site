/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./include/*.{html,js,php}"],
  theme: {
    extend: {
      fontFamily:{
        lato:["Lato"],
        poppins:["Poppins"],
       },
      variants: {
        extend: {
        display: ["group-hover"],
    },
},
    },
  },
 
  plugins: [],
}

