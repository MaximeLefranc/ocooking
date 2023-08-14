<template>
  <nav>
    <router-link to="/">Home</router-link> |
    <router-link to="/about">About</router-link>
  </nav>
  <router-view />
</template>

<style>
html,
body,
div,
span,
applet,
object,
iframe,
h1,
h2,
h3,
h4,
h5,
h6,
p,
blockquote,
pre,
a,
abbr,
acronym,
address,
big,
cite,
code,
del,
dfn,
em,
img,
ins,
kbd,
q,
s,
samp,
small,
strike,
strong,
sub,
sup,
tt,
var,
b,
u,
i,
center,
dl,
dt,
dd,
ol,
ul,
li,
fieldset,
form,
label,
legend,
table,
caption,
tbody,
tfoot,
thead,
tr,
th,
td,
article,
aside,
canvas,
details,
embed,
figure,
figcaption,
footer,
header,
hgroup,
menu,
nav,
output,
ruby,
section,
summary,
time,
mark,
audio,
video {
  font-size: 100%;
  font: inherit;
  vertical-align: baseline;
  border: 0;
  margin: 0;
  padding: 0;
}

article,
aside,
details,
figcaption,
figure,
footer,
header,
hgroup,
menu,
nav,
section {
  display: block;
}

body {
  line-height: 1;
}

ol,
ul {
  list-style: none;
}

blockquote,
q {
  quotes: none;
}

blockquote:before,
blockquote:after,
q:before,
q:after {
  content: "";
  content: none;
}

table {
  border-collapse: collapse;
  border-spacing: 0;
}

@font-face {
  font-family: Montserrat;
  src: url("@/assets/fonts/Montserrat-Regular.ttf");
}

@font-face {
  font-family: Montserrat Black;
  src: url("@/assets/fonts/Montserrat-Black.ttf");
}

@font-face {
  font-family: Montserrat Bold;
  src: url("@/assets/fonts/Montserrat-Bold.ttf");
}

@font-face {
  font-family: Montserrat Italic;
  src: url("@/assets/fonts/Montserrat-Italic.ttf");
}

html,
body {
  font-family: Montserrat, Arial;
  font-size: 14px;
  line-height: 1.4;
}

* {
  box-sizing: border-box;
}

a {
  color: #000;
  text-decoration: none;
}

h1,
h2,
h3 {
  text-transform: uppercase;
  font-family: Montserrat Black, Arial Black;
}

h1 {
  text-align: center;
  margin: 1rem auto;
  font-size: 2rem;
}

h2 {
  margin: 1rem auto .5rem;
  font-size: 1.2rem;
}

/*# sourceMappingURL=homepage.78e4e4ca.css.map */
</style>
