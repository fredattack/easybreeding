/**
 * Created by fred on 14-02-18.
 */
import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import { DropDownListComponent, DropDownList } from '@syncfusion/ej2-react-dropdowns';
import { Query } from '@syncfusion/ej2-data';

export default class App extends React.Component<{}, {}> {
    constructor(){
        super();
        this.onorderChange=this.onorderChange.bind(this);
        this.onfamillyChange=this.onfamillyChange.bind(this);
    }
    // order DropDownList instance
    private orderObj: DropDownList;

    // familly DropDownList instance
    private famillyObj: DropDownList;

    // species DropDownList instance
    private speciesObj: DropDownList;

    //define the order DropDownList data
    private orderData: { [key: string]: Object }[] = [
        { orderName: 'Australia', orderId: '2' },
        { orderName: 'United famillys', orderId: '1' }
    ];

    //define the familly DropDownList data
    private famillyData: { [key: string]: Object }[] = [
        { famillyName: 'New York', orderId: '1', famillyId: '101' },
        { famillyName: 'Virginia ', orderId: '1', famillyId: '102' },
        { famillyName: 'Tasmania ', orderId: '2', famillyId: '105' }
    ];

    //define the species DropDownList data
    private speciesData: { [key: string]: Object }[] = [
        { speciesName: 'Albany', famillyId: '101', speciesId: 201 },
        { speciesName: 'Beacon ', famillyId: '101', speciesId: 202 },
        { speciesName: 'Emporia', famillyId: '102', speciesId: 206 },
        { speciesName: 'Hampton ', famillyId: '102', speciesId: 205 },
        { speciesName: 'Hobart', famillyId: '105', speciesId: 213 },
        { speciesName: 'Launceston ', famillyId: '105', speciesId: 214 }
    ];

    // maps the order column to fields property
    private orderField: object = { value: 'orderId', text: 'orderName' };

    // maps the familly column to fields property
    private famillyField: object = { value: 'famillyId', text: 'famillyName' };

    // maps the species column to fields property
    private speciesField: object = { text: 'speciesName', value: 'speciesId' };

    onorderChange() {
        // query the data source based on order DropDownList selected value
        this.famillyObj.query = new Query().where('orderId', 'equal', this.orderObj.value);
        // enable the familly DropDownList
        this.famillyObj.enabled = true;
        // clear the existing selection.
        this.famillyObj.text = null;
        // bind the property changes to familly DropDownList
        this.famillyObj.dataBind();
        // clear the existing selection in species DropDownList
        this.speciesObj.text = null;
        // disable the species DropDownList
        this.speciesObj.enabled = false;
        // bind the property change to species DropDownList
        this.speciesObj.dataBind();
    }
    onfamillyChange() {
        // query the data source based on familly DropDownList selected value
        this.speciesObj.query = new Query().where('famillyId', 'equal', this.famillyObj.value);
        // enable the species DropDownList
        this.speciesObj.enabled = true;
        //clear the existing selection
        this.speciesObj.text = null;
        // bind the property change to species DropDownList
        this.speciesObj.dataBind();
    }

    render() {
        return (
            <div>
                <DropDownListComponent id="order-ddl" ref={(scope) => { this.orderObj = scope; }} fields={this.orderField} dataSource={this.orderData} placeholder='Select a order' change={this.onorderChange} />

                <DropDownListComponent id="familly-ddl" ref={(scope) => { this.famillyObj = scope; }} enabled={false} fields={this.famillyField} dataSource={this.famillyData} placeholder='Select a familly' change={this.onfamillyChange} />

                <DropDownListComponent id="species-ddl" ref={(scope) => { this.speciesObj = scope; }} enabled={false} fields={this.speciesField} dataSource={this.speciesData} placeholder='Select a species' />
            </div>
        );
    }
}
ReactDOM.render(<App/>, document.getElementById('sample'));