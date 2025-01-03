/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './**/*.{html,js,php}',   // Scan HTML, JS, and PHP files
    './src/**/*.{html,js,php}'  // Include src folder and subdirectories, adjust as needed
  ],
  theme: {
    extend: {
      colors: {
        primary: {
          blue: '#0E51A0',
          red: '#E31D1C'
        }
      },
      fontSize: {
        'headingCustom': ['2.4rem', '3rem'],
        'headingCustomSmall': ['2.1rem', '2.5rem'],
        'mediumFont': ['0.80rem', '1.3rem'],
        'smallFont': ['0.6rem', '1rem']
      },
      screens: {
        md: '950px',
        customMd: '830px',
        customLg: '1150px'
      },
      maxWidth: {
        'customMax': '103rem'
      },
      backgroundImage: {
        'custom-gradient': 'linear-gradient(138.25deg, rgba(14, 81, 160, 0.05) -6.91%, rgba(227, 29, 28, 0.05) 106.82%)'
      }
    }
  },
  variants: {
    extend: {
      fontSize: ['responsive', 'important'], 
    }
  },
  plugins: [],
}
