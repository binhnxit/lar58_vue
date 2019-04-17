
const requireModule = require.context('admin/lang/vn', true, /\.json$/)
const modules = {}

requireModule.keys().forEach(fileName => {
  const module = fileName.replace(/(\.\/|\.json)/g, '')
  modules[module] = requireModule(fileName)
})

export default modules
