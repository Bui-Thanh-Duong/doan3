import db from '../config/db.js';

export const getMenu = async () => {
    const query = `SELECT * FROM menu WHERE status = '1'`;
    const [menu] = await db.execute(query);
    return menu;
};

export const getTables = async () => {
    const query = `SELECT * FROM tables WHERE status = '0'`;
    const [table] = await db.execute(query);
    return table;
};

// Hàm để kiểm tra tính duy nhất của itemID
const isItemIDUnique = async (itemID) => {
    const query = 'SELECT COUNT(*) as count FROM order_items WHERE itemID = ?';
    const [result] = await db.execute(query, [itemID]);
    return result[0].count === 0; // Trả về true nếu không có itemID trùng
};

// Hàm để tạo itemID duy nhất
const generateUniqueItemID = async () => {
    let itemID;
    let isUnique = false;

    while (!isUnique) {
        // Tạo itemID ngẫu nhiên
        itemID = 'ORI-' + String(Math.floor(Math.random() * 1000)).padStart(3, '0'); 
        isUnique = await isItemIDUnique(itemID); // Kiểm tra tính duy nhất
    }

    return itemID;
};

export const addOrder = async (orderData) => {
    const { tableID, orderID, currentTime, dishDetails } = orderData;

    // Chèn đơn hàng vào bảng `orders`
    const orderQuery = 'INSERT INTO orders (orderID, tableID, orderTime, status) VALUES (?, ?, ?, ?)';
    await db.execute(orderQuery, [orderID, tableID, currentTime, 0]);

    // Chèn chi tiết món ăn vào bảng `order_items`
    for (const dish of dishDetails) {
        const { dishID, quantity, note } = dish;
        
        // Tạo itemID duy nhất
        const itemID = await generateUniqueItemID();

        const itemQuery = 'INSERT INTO order_items (itemID, orderID, dishID, quantity, status, note) VALUES (?, ?, ?, ?, ?, ?)';
        await db.execute(itemQuery, [itemID, orderID, dishID, quantity, 0, note]);
    }
};