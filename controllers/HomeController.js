import { getEmployee } from '../models/EmployeeModel.js';

export const renderHome_management = (req, res) => {
    const { employeeID, username } = req.session;
    res.render('management/home', { username, employeeID });
};

export const renderHome_employee = (req, res) => {
    const { branchID, employeeID, username } = req.session;
    res.render('employees/home', { username, employeeID, branchID });
};

export const renderHome_staff = async (req, res) => {
    const employeeID = req.session.employeeID;
    const employee = await getEmployee(employeeID);
    if (employee) {
        const datecreateAT = new Date(employee.createAT);

        const createAT = datecreateAT.toLocaleDateString('vi-VN', {
            year: 'numeric',
            month: 'numeric',
            day: 'numeric'
        });

        const datebirthday= new Date(employee.birthday);
        
        const birthday = datebirthday.toLocaleDateString('vi-VN', {
            year: 'numeric',
            month: 'numeric',
            day: 'numeric'
        });

        const username = employee.username;
        const avatar = employee.avatar;
        res.render('staffs/home', {content: "main", employee, username, createAT, birthday, avatar });
    } else {
        res.status(404).send('Nhân viên không còn làm việc ở nhà hàng');
    }
};