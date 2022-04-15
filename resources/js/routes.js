import EmployeesIndex from './components/employees/index';
import EmployeesCreate from './components/employees/create';
import EmployeesEdit from './components/employees/edit';
export const routes = [
    {
        path: '/employees',
        name: 'employeesIndex',
        component: EmployeesIndex,
    },
    {
        path: '/employees/create',
        name: 'employeesIndex',
        component: EmployeesCreate,
    },
    {
        path: '/employees/:id',
        name: 'employeesIndex',
        component: EmployeesEdit,
    },
];