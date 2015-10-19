new TWTR.Widget({
  version: 2,
  type: 'profile',
  rpp: 10,
  interval: 30000,
width: 300,
  height: 300,
  theme: {
    shell: {
      background: '#2CA0E8',
      color: '#ffffff'
    },
    tweets: {
      background: '#ffffff',
      color: '#522CE8',
      links: '#2CA0E8'
    }
  },
  features: {
    scrollbar: true,
    loop: false,
    live: true,
    behavior: 'all'
  }
}).render().setUser('tinorace').start();