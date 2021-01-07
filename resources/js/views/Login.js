require('../app');
import React, { Component } from 'react'
import ReactDOM from 'react-dom'
import { BrowserRouter, Route, Switch } from 'react-router-dom'
import Login from '../components/Login'
import Cadastro from '../components/cadastro'
import '../variables'


class App extends Component {
  render() {
    return (
      <div>
        <BrowserRouter>
          <div className="container-scroller">
              <div className="container-fluid page-body-wrapper full-page-wrapper">
                  <div className="content-wrapper d-flex align-items-center auth rounded">
                      <div className="row flex-grow">
                          <div className="col-lg-4 mx-auto rounded">
                              <div>
                                <Switch>
                                  <Route exact path='/login' component={Login} />
                                  <Route path='/cadastro' component={Cadastro} />
                                </Switch>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
        </BrowserRouter>
      </div>
    )
  }
}

ReactDOM.render(<App />, document.getElementById('app'))
