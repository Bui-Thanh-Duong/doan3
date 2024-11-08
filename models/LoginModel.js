import db from '../config/db.js';

export const getUserByUsername = async (username) => {
    const query = `SELECT * 
                    FROM employee, role
                    WHERE employee.roleID = role.roleID 
                        AND username = '${username}'`;
    const [[employee]] = await db.execute(query, [username]);
    return employee;
};