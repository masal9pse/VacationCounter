export default function({store, redirect}) {
 if (!store.state.index.auth_user) {
  redirect('/login')
 }
}
