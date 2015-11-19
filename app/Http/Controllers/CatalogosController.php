<?php
namespace App\Http\Controllers;
use Log;
use Request;
use Response;
use App\Models\FormaPago;
use App\Models\Proveedor;
use App\Models\Rol;
use App\Models\Servicio;
use App\Models\Ubicacion;
class CatalogosController extends Controller{
    public function formasPagoView(){
        return Response::view('catalogos.formasPago');
    }
    public function getAllFormasPago(){
        return Response::json(FormaPago::all());
    }
    public function addFormaPago(){
        return FormaPago::create(Request::all());
    }
    public function updateFormaPago(){
        $cat = FormaPago::find(Request::get('id'));
        $cat->fill(Request::all());
        $cat->save();
    }
    public function deleteFormaPago($id){
        $cat = Ubicacion::find($id);
        $cat->delete();
    }
    
    public function proveedoresView(){
        return Response::view('catalogos.proveedores');
    }
    public function getAllProveedores(){
        return Response::json(Proveedor::all());
    }
    public function addProveedor(){
        return Proveedor::create(Request::all());
    }
    public function updateProveedor(){
        $proveedor = Proveedor::find(Request::get('id'));
        $proveedor->fill(Request::all());
        $proveedor->save();
    }
    public function deleteProveedor($id){
        Log::info(Request::all());
        $proveedor = Proveedor::find($id);
        $proveedor->delete();
    }
    
    public function serviciosView(){
        return Response::view('catalogos.servicios');
    }
    public function getAllServicios(){
        return Response::json(Servicio::all());
    }
    public function addServicio(){
        return Servicio::create(Request::all());
    }
    public function updateServicio(){
        $servicio = Servicio::find(Request::get('id'));
        $servicio->fill(Request::all());
        $servicio->save();
    }
    public function deleteServicio($id){
        Log::info(Request::all());
        $servicio = Servicio::find($id);
        $servicio->delete();
    }
    
    public function rolesView(){
        return Response::view('catalogos.roles');
    }
    public function getAllRoles(){
        return Response::json(Rol::all());
    }
    public function addRol(){
        return Rol::create(Request::all());
    }
    public function updateRol(){
        $rol = Rol::find(Request::get('id'));
        $rol->fill(Request::all());
        $rol->save();
    }
    public function deleteRol($id){
        $rol = Rol::find($id);
        $rol->delete();
    }
    
    public function ubicacionesView(){
        return Response::view('catalogos.ubicaciones');
    }
    public function getAllUbicaciones(){
        return Response::json(Ubicacion::all());
    }
    public function addUbicacion(){
        return Ubicacion::create(Request::all());
    }
    public function updateUbicacion(){
        $cat = Ubicacion::find(Request::get('id'));
        $cat->fill(Request::all());
        $cat->save();
    }
    public function deleteUbicacion($id){
        $cat = Ubicacion::find($id);
        $cat->delete();
    }
}