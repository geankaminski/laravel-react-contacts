import React, { useState, useEffect, useRef } from 'react'
import { connect } from 'react-redux';
import rootAction from '../../redux/actions/index'
import { fadeIn } from 'animate.css'
import BeatLoader from 'react-spinners/BeatLoader'
import { showNotifications} from '../../Helpers'
import LoadingOverlay from 'react-loading-overlay';
import SimpleReactValidator from 'simple-react-validator';
import { Link, useHistory } from 'react-router-dom';

function EditContact(props) {

    const [state, setState] = useState({
        lead: props.location.state.lead ? props.location.state.lead : '',
        name: props.location.state.lead.name ? props.location.state.lead.name : '',
        email: props.location.state.lead.email ? props.location.state.lead.email : '',
        phone: props.location.state.lead.phone ? props.location.state.lead.phone : '',
        address: props.location.state.lead.address ? props.location.state.lead.address : '',
        description: props.location.state.lead.description ? props.location.state.lead.description : '',
        loading: false,
        authUser: props.authUserProp
    });

    let history = useHistory();

    const [, forceUpdate] = useState()
    const simpleValidator = useRef(new SimpleReactValidator({
            autoForceUpdate: {forceUpdate: forceUpdate},
            className: 'small text-danger mdi mdi-alert pt-1 pl-1'
    }));

    useEffect(() => {
        document.title = 'Editar Contato';

        props.setActiveComponentProp('EditContact');
    }, []);

    const onChangeHandle = (e) =>{
        const { name, value } = e.target;
        setState({
            ...state,
            [name] : value
        });
    }

    const onSubmitHandle = (e) =>{
        e.preventDefault();

        if (simpleValidator.current.allValid()) {
            setState({
                ...state,
                loading: true
            });

            axios.post('/api/v1/contato/atualizar', $(e.target).serialize())
            .then(response => {
                setState({
                    ...state,
                    loading: false
                });
                if (response.data.status == 'validation-error') {
                    var errorArray = response.data.message;
                    $.each( errorArray, function( key, errors ) {
                        $.each( errors, function( key, errorMessage ) {
                            showNotifications({
                                type : 'error',
                                message : errorMessage
                            });
                        });
                    });
                } else if (response.data.status == 'error') {
                        showNotifications({
                            type : 'error',
                            message : response.data.message
                        });
                } else if (response.data.status == 'success') {
                    showNotifications({
                        type : 'success',
                        message : response.data.message
                    });
                    history.push('/contato/lista')
                }
            })
            .catch((error) => {
                console.log(error);

                setState({
                    ...state,
                    loading: false
                });
                if (error.response.data.status == 'validation-error') {
                    var errorArray = error.response.data.message;
                    $.each( errorArray, function( key, errors ) {
                        $.each( errors, function( key, errorMessage ) {
                            showNotifications({
                                type : 'error',
                                message : errorMessage
                            });
                        });
                    });
                } else if (error.response.data.status == 'error') {
                    showNotifications({
                        type : 'error',
                        message : error.response.data.message
                    });
                }
            });
        } else {
            simpleValidator.current.showMessages();
            forceUpdate(1);
        }

    }

    return (
        <>

                <div className="card animated fadeIn">
                    <div className="card-body">
                        <div className="row new-lead-wrapper d-flex justify-content-center">
                            <div className="col-md-8 ">
                                <LoadingOverlay
                                    active={state.loading}
                                    spinner={<BeatLoader />}
                                    styles={{
                                        overlay: (base) => ({
                                            ...base,
                                            opacity: '0.5',
                                            filter: 'alpha(opacity=50)',
                                            background: 'white'
                                        })
                                    }}
                                >
                                    <form className="edit-lead-form border" onSubmit={onSubmitHandle}>
                                        <input type="hidden" name="api_token" value={state.authUser.api_token} />
                                        <input type="hidden" name="lead_id" value={state.lead.id} />
                                        <div className="form-group">
                                            <ul className="nav nav-tabs nav-pills c--nav-pills nav-justified">
                                                <li className="nav-item">
                                                    <span className="nav-link btn btn-gradient-primary btn-block active">Editar Contact</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div className="form-group">
                                            <label>Nome</label>
                                            <div className="input-group input-group-sm">
                                                <div className="input-group-prepend">
                                                    <span className="input-group-text bg-gradient-success text-white">
                                                        <i className="mdi mdi-account"></i>
                                                    </span>
                                                </div>
                                                <input type="text" className="form-control form-control-sm" id="name" name="name" placeholder="Nome"
                                                value={state.name} onChange={onChangeHandle}/>
                                            </div>
                                            {simpleValidator.current.message('name', state.name, 'required')}
                                        </div>
                                        <div className="form-group">
                                            <label>E-mail</label>
                                            <div className="input-group input-group-sm">
                                                <div className="input-group-prepend">
                                                    <span className="input-group-text bg-gradient-success text-white">
                                                        <i className="mdi mdi-email"></i>
                                                    </span>
                                                </div>
                                                <input type="text" className="form-control form-control-sm" id="email" name="email" placeholder="E-mail" value={state.email} onChange={onChangeHandle}/>
                                            </div>
                                            {simpleValidator.current.message('email', state.email, 'required|email')}
                                        </div>
                                        <div className="form-group">
                                            <label>Telefone</label>
                                            <div className="input-group input-group-sm">
                                                <div className="input-group-prepend">
                                                    <span className="input-group-text bg-gradient-success text-white">
                                                        <i className="mdi mdi-phone"></i>
                                                    </span>
                                                </div>
                                                <input type="text" className="form-control form-control-sm" id="phone" name="phone" placeholder="Telefone" value={state.phone} onChange={onChangeHandle}/>
                                            </div>
                                            {simpleValidator.current.message('phone', state.phone, 'required|phone')}
                                        </div>
                                        <div className="form-group">
                                            <label>Endereço</label>
                                            <div className="input-group input-group-sm">
                                                <div className="input-group-prepend">
                                                    <span className="input-group-text bg-gradient-success text-white">
                                                        <i className="mdi mdi-home"></i>
                                                    </span>
                                                </div>
                                                <input type="text" className="form-control form-control-sm" id="address" name="address" placeholder="Endereço" value={state.address} onChange={onChangeHandle}/>
                                            </div>
                                        </div>
                                        <div className="form-group">
                                            <label>Descrição</label>
                                            <div className="input-group input-group-sm">
                                                <div className="input-group-prepend">
                                                    <span className="input-group-text bg-gradient-success text-white">
                                                        <i className="mdi mdi-pencil"></i>
                                                    </span>
                                                </div>
                                                <textarea className="form-control form-control-sm" id="description" name="description" placeholder="Descrição" value={state.description} onChange={onChangeHandle}></textarea>
                                            </div>
                                        </div>
                                        <div className="form-group">
                                            <hr />
                                        </div>
                                        <div className="form-group text-center">
                                            <button type="submit" className="btn btn-gradient-primary btn-md mr-2">Atualizar</button>
                                            <Link to='/contato/lista' className="btn btn-inverse-secondary btn-md">Cancelar</Link>
                                        </div>
                                    </form>
                                </LoadingOverlay>
                            </div>
                        </div>
                    </div>
                </div>
        </>
    );
}


const mapStateToProps = (state) => {
    return {
        authUserProp: state.authUserReducer,
        activeComponentProp: state.activeComponentReducer,
    }
}


const mapDispatchToProps = (dispatch) => {
    return {
        setAuthUserProp: (user) => dispatch(setAuthUser(user)),
        setActiveComponentProp: (component) => dispatch(rootAction.setActiveComponent(component))
    }
};

export default connect(mapStateToProps, mapDispatchToProps)(EditContact)

