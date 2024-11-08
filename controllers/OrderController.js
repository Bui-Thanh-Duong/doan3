import * as orders from '../models/OrderModel.js';
import * as employees from '../models/EmployeeModel.js';

export const renderOrder = async (req, res) => {
    // Thông tin nhân viên
    const employeeID = req.session.employeeID;
    const employee = await employees.getEmployee(employeeID);
    const username = employee.username;
    const avatar = employee.avatar;

    // Lấy bàn
    const table = await orders.getTables();

    // Lấy món ăn
    const menu = await orders.getMenu();

    res.render('staffs/home', { content: "order", employee, username, avatar, table, menu });
};

export const orderAdd = async (req, res) => {
    const tableID = req.body.tableID; // Lấy bàn
    const dishIDs = req.body.dishID || []; // Lấy ID món ăn, đảm bảo là mảng
    const quantities = req.body.quantity || []; // Lấy số lượng
    const notes = req.body.note || []; // Lấy yêu cầu đặc biệt

    // Kiểm tra chiều dài của các mảng
    if (dishIDs.length !== quantities.length || dishIDs.length !== notes.length) {
        return res.status(400).send('Mảng dishID, quantity và note phải có cùng chiều dài');
    }

    // Lấy thời gian hiện tại theo múi giờ 'Asia/Ho_Chi_Minh'
    const timezone = new Date().toLocaleString('en-US', { timeZone: 'Asia/Ho_Chi_Minh' });
    const currentTime = new Date(timezone).toISOString().slice(0, 19).replace('T', ' ');
    const formattedNumber = new Date().toISOString().slice(11, 19).replace(/:/g, '') + new Date().toISOString().slice(0, 10).replace(/-/g, '');
    const orderID = 'OR-' + formattedNumber;

    // Tạo mảng chi tiết món ăn
    const dishDetails = dishIDs.map((dishID, index) => {
        const quantity = quantities[index];
        const note = notes[index];
        const itemID = 'ORI-' + String(Math.floor(Math.random() * 1000)).padStart(3, '0'); // Tạo itemID ngẫu nhiên

        return { itemID, dishID, quantity, note };
    });

    // Gọi hàm thêm đơn hàng
    await orders.addOrder({ tableID, orderID, currentTime, dishDetails });
    
    // Cập nhật trạng thái bàn
    await db.execute('UPDATE tables SET status = 1 WHERE tableID = ?', [tableID]);
    
    // Chuyển hướng đến danh sách đơn hàng
    res.redirect('/list_order');
};