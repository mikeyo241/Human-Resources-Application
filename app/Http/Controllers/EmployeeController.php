<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
class EmployeeController extends Controller
{
  /**
   * This funtion is used to store a new employee into the database.
   * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
   */
  public function store() {


      // Create a new Employee
      $employee = new Employee;

      // Get the data ready to be stored into the database.
      $employee->name = request('name');
      $employee->age = request('age');
      $employee->sex = request('sex');
      $employee->office = request('office');
      $employee->supervisor = request('supervisor');

      // Save the employee to the database.
      $employee->save();

      // Redirect back to the HR System page.
      return redirect('/hrSystem');
    }

  /**
   * This function is used to update a users information.
   * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
   */
  public function update() {

      // Search the database for a record with  a certain id.
      $employee = Employee::firstOrNew(['id' => request('id')]);

      // Get the data ready to be stored into the database.
      $employee->name = request('name');
      $employee->age = request('age');
      $employee->sex = request('sex');
      $employee->office = request('office');
      $employee->supervisor = request('supervisor');

      // Save changes made to the database.
      $employee->save();

      // Redirect back to the HR System.
      return redirect('/hrSystem');
    }

  /**
   * This function is used to soft-delete an employee from the database.
   * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
   */
  public function destroy() {

    // Search the database for a record with a certain id.
      $employee = Employee::firstOrNew(['id' => request('id')]);

      // Set the deleted Column to true.
      $employee->deleted = 1;

      // Save the database.
      $employee->save();

        // Redirect back to the HR System.
      return redirect('/hrSystem');
    }

  public function cancel(){
    return redirect('/hrSystem');
  }

}
