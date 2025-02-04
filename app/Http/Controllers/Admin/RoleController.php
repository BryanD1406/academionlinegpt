<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    //*Creamos un constructor para usar un middleware y poder protegeer la ruta index
    public function __construct()
    {
        $this->middleware('can:Listar role')->only('index');
        $this->middleware('can:Crear role')->only('create', 'store');
        $this->middleware('can:Editar role')->only('edit', 'update');
        $this->middleware('can:Eliminar role')->only('destroy');
    }

    /*
     * CRUD
     */
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('admin.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //*Validaciones
        $request->validate([
            'name' => ['unique:roles', 'required'],
            'permissions' => 'required'
        ]);

        $role  =  Role::create([
            'name' => $request->name,
        ]);


        $role->permissions()->attach($request->permissions);
        //*Mensaje de session
        //*with->, primero se pasa el nombre de la variable donde queremos almacenar mensaje de sesion
        //*with->, Como segundo parametro el mensaje que queremos mostar

        return redirect()->route('admin.roles.index')->with('info', 'El rol se creo satisfactoriamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        return view('admin.roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        //*Validaciones
        $request->validate([
            'name' => ['required'],
            'permissions' => 'required'
        ]);


        $role->update([
            'name' => $request->name
        ]);

        //*El metodo sync elimina todo el registro relacionado al rol que le pasamos y crea uno nuevo con los datos cambiados
        $role->permissions()->sync($request->permissions);
        return redirect()->route('admin.roles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('admin.roles.index')->with('info', 'Se ha borrado correctamente el rol');
    }
}
