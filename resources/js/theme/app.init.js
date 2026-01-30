var userSettings = {
  Layout: localStorage.getItem('layout') || "vertical", // vertical | horizontal
  SidebarType: localStorage.getItem('sidebarType') || "full", // full | mini-sidebar
  BoxedLayout: localStorage.getItem('boxedLayout') === 'true' || localStorage.getItem('boxedLayout') === null, // true | false
  Direction: localStorage.getItem('direction') || "ltr", // ltr | rtl
  Theme: localStorage.getItem('theme') || "light", // light | dark
  ColorTheme: localStorage.getItem('color-theme') || "Blue_Theme",
  cardBorder: localStorage.getItem('cardBorder') === 'true', // true | false
};
