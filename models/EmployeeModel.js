import db from '../config/db.js';

export const getEmployee = async (employeeID) => {
    const query = `
        SELECT *
        FROM employee, role, branch
        WHERE employee.roleID = role.roleID
            AND employee.branchID = branch.branchID
            AND employee.status = '1'
            AND employee.employeeID = '${employeeID}'`;
    const [rows] = await db.execute(query, [employeeID]);
    return rows[0];
};