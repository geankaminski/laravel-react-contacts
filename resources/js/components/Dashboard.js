import React, {  useState, useEffect } from 'react'
import Pagination from "react-js-pagination";
import { useSelector, connect } from 'react-redux';
import rootAction from '../redux/actions/index'
import { fadeIn } from 'animate.css'

function Dashboard(props) {

    const [state, setState] = useState({
       authUser: props.authUserProp,
       recentLeads: [],
       loading: false
    });

    useEffect(() => {
        props.setActiveComponentProp('Dashboard');
        loadData();
    }, []);

    const loadData = () => {
        setState({
            ...state,
            loading: true
        });
        axios.get('/api/v1/dashboard', {
            params: {
                api_token: state.authUser.api_token,
            }
        })
        .then(response => {
            setState({
                ...state,
                loading: false,
                recentLeads: response.data.message.recentLeads,
            })
        })
        .catch((error) => {
            setState({
                ...state,
                loading: false
            });
            console.log(error);
        });
    };

    const showRecentLeads = () => {
        return state.recentLeads.length == 0 ? <tr><td className="text-muted lead">Nenhum contato adicionado recentemente</td></tr> :
                state.recentLeads.map((lead, i) => {
                    return <tr key={i}>
                                <td>
                                    <img src="/assets/images/faces/face1.jpg" className="mr-2" alt="image"/> {lead.name} </td>
                                <td> {lead.email} </td>
                                <td> {lead.phone} </td>
                            </tr>;
                });
    };

    return (
        <>
            <div className="page-header">
				<h3 className="page-title">
					<span className="page-title-icon bg-gradient-primary text-white mr-2">
						<i className="mdi mdi-home"></i>
					</span>
				 	Dashboard
				</h3>
			</div>
            <div className="row">
              <div className="col-12 grid-margin">
                <div className="card">
                    <div className="card-body animated fadeIn">
                        <h4 className="card-title">Contatos</h4>
                        <div className="table-responsive">
                        <table className="table">
                            <thead>
                            <tr>
                                <th> Nome </th>
                                <th> E-mail </th>
                                <th> Telefone </th>
                            </tr>
                            </thead>
                            <tbody>
                                {showRecentLeads()}
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
              </div>
            </div>
        </>
    );
}


//redux state can be accessed as props in this component(Optional)
const mapStateToProps = (state) => {
	return {
		authUserProp: state.authUserReducer,
		activeComponentProp: state.activeComponentReducer,
	}
}

/**
 * redux state can be change by calling 'props.setAuthUserProp('demo user');' when
 * applicable(Optional to )
 *
 */
const mapDispatchToProps = (dispatch) => {
    return {
        setAuthUserProp: (user) => dispatch(rootAction.setAuthUser(user)),
        setActiveComponentProp: (component) => dispatch(rootAction.setActiveComponent(component))
    }
};

export default connect(mapStateToProps, mapDispatchToProps)(Dashboard)
