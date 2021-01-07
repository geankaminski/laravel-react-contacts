require('../app');
import React, { useEffect } from 'react'
import ReactDOM from 'react-dom'
import { BrowserRouter, Route, Switch, Link } from 'react-router-dom'
import ContactList from '../components/List/ContactList'
import NewContact from '../components/List/NewContact'
import EditContact from '../components/List/EditContact'
import '../variables'
import {createStore} from 'redux';
import rootReducer from '../redux/reducers/index'
import { Provider, useDispatch, useSelector } from 'react-redux'
import rootAction from '../redux/actions/index'

//create reducer
const myStore = createStore(
	rootReducer,
	window.__REDUX_DEVTOOLS_EXTENSION__ && window.__REDUX_DEVTOOLS_EXTENSION__()
);


function App() {
	//set reducer
	const myDispatch = useDispatch();
	myDispatch(rootAction.setAuthUser(authUser)); //authUser is from blade file

	//get reducer
    const activeComponent = useSelector(state => state.activeComponentReducer);

	return (
		<>
			<BrowserRouter>
			<div className="page-header">
				<h3 className="page-title">
					<span className="page-title-icon bg-gradient-primary text-white mr-2">
						{ activeComponent && activeComponent == 'ContactList' ?
						<i className="mdi mdi-account-multiple"></i> : (activeComponent && activeComponent == 'NewContact' ? <i className="mdi mdi-account-plus"></i> :
						(activeComponent && activeComponent == 'EditContact' ? <i className="mdi mdi-folder-account"></i> : '' ) )
					}
					</span>
				 	{ activeComponent && activeComponent == 'ContactList' ?
						'Contatos' : (activeComponent && activeComponent == 'NewContact' ? 'Novo' :
						(activeComponent && activeComponent == 'EditContact' ? 'Editar' : '' ) )
					}
				</h3>
				<nav aria-label="breadcrumb">
					{ activeComponent && activeComponent != 'ContactList' ?
						<Link to='/contato/lista' className="btn btn-social-icon-text btn-linkedin"><i className="mdi mdi-arrow-left-bold btn-icon-prepend"></i>&nbsp; Voltar</Link> : <Link to='/contato/novo' className="btn btn-social-icon-text btn-linkedin"><i className="mdi mdi-account-plus btn-icon-prepend"></i>&nbsp; Novo</Link>
					}
				</nav>
			</div>
			<div className="row">
				<div className="col-lg-12 grid-margin stretch-card">

						<Switch>
							<Route exact path='/contato/lista' > <ContactList /> </Route>
							<Route path='/contato/novo' > <NewContact /> </Route>
							<Route path='/contato/editar/:id' component={EditContact} />
						</Switch>

				</div>
			</div>
			</BrowserRouter>
		</>
	);
}

ReactDOM.render(
	<Provider store={myStore}>
		<App />
	</Provider>
, document.getElementById('app'))
