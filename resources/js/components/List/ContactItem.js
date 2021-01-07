import React, { Component } from 'react'
import moment from 'moment';
import { Link } from 'react-router-dom';

class ContactItem extends Component {
    constructor(props) {
        super(props);
        this.state = {

        }

    }

    componentDidMount() {

    }

    render() {
        return (
            <>
                <div className="container-portlet">
                    <div className="container-portlet__body">
                        <div className="container-widget container-widget--user-profile-3">
                            <div className="container-widget__top">
                                { true ?
                                <div className="container-widget__media container-hidden-">
                                    <img src="/assets/images/faces/face1.jpg" alt="image" />
                                </div> :
                                <div
                                    className="container-widget__pic container-widget__pic--danger container-font-danger container-font-boldest container-font-light ">
                                    {this.props.obj.name.split(' ').map(function(str) { return str ? str[0].toUpperCase() : "";}).join('')}
                                </div> }
                                <div className="container-widget__content">
                                    <div className="container-widget__head">
                                        <Link to={{
                                            pathname: `/contato/editar/${this.props.obj.id}`,
                                            state: {
                                                lead: this.props.obj
                                            }
                                        }} className="container-widget__username">
                                            {this.props.obj.name}
                                            { this.props.obj.status == 0 ? <i className="mdi mdi-close-circle-outline container-font-danger"></i>
                                            : <i className="mdi mdi-checkbox-marked-circle container-font-success"></i> }
                                        </Link>
                                        <div className="container-widget__action">
                                            <Link to={{
                                                pathname: `/contato/editar/${this.props.obj.id}`,
                                                state: {
                                                    lead: this.props.obj
                                                }
                                            }} type="button" className="btn btn-outline-success btn-sm btn-upper">Editar</Link>&nbsp;
                                            <button type="button" className="btn btn-danger btn-sm btn-upper" onClick={() => this.props.onClickDeleteHandler(this.props.obj.id)}>Apagar</button>
                                        </div>
                                    </div>
                                    <div className="container-widget__subhead d-flex flex-column flex-md-row">
                                        <a href={void(0)}><i className="mdi mdi-email"></i>{this.props.obj.email}</a>
                                        <a href={void(0)}><i className="mdi mdi-phone"></i>{this.props.obj.phone} </a>
                                        { this.props.obj.address ? <a href={void(0)}><i className="mdi mdi-home"></i>{this.props.obj.address}</a> : '' }
                                    </div>
                                    <div className="container-widget__info">
                                        <div className="container-widget__desc">
                                            {this.props.obj.description}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </>
        )
    }
}

export default ContactItem
