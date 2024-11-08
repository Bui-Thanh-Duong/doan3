import { getUserByUsername } from '../models/LoginModel.js';

export const renderLogin = (req, res) => res.render('./login');

export const handleLogin = async (req, res) => {
    const { username, password } = req.body;
    const employee = await getUserByUsername(username);

    if (!employee) {
        return res.status(404).send("Sai tên tài khoản và mật khẩu");
    }
    if (employee.password !== password) {
        return res.status(401).send("Sai mật khẩu");
    }
    if (employee.roleID === 'PQ01') {
        req.session.employeeID = employee.employeeID;
        req.session.username = username;
        return res.redirect('/managements/home');
    }
    if (employee.roleID === 'PQ02') {
        req.session.branchID = employee.branchID;
        req.session.employeeID = employee.employeeID;
        req.session.username = username;
        return res.redirect('/employees/home');
    }
    if (['PQ03', 'PQ04', 'PQ05', 'PQ06', 'PQ07', 'PQ08', 'PQ09'].includes(employee.roleID)) {
        req.session.branchID = employee.branchID;
        req.session.employeeID = employee.employeeID;
        req.session.username = username;
        return res.redirect('/staffs/home');
    }
};
