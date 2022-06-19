import { Configuration } from '@/openapi'

const apiConfig = new Configuration({
  basePath: 'http://localhost:8000/api',
  credentials: 'include',
})

export { apiConfig }
