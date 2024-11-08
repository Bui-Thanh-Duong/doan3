import express from 'express';
import { renderLogin, handleLogin } from '../controllers/LoginController.js';
import * as home from '../controllers/HomeController.js';
import * as order from '../controllers/OrderController.js';

const router = express.Router();

// Đăng nhập
router.get('/', renderLogin);
router.post('/checklogin', handleLogin);

// Trang chủ
router.get('/managements/home', home.renderHome_management);
router.get('/employees/home', home.renderHome_employee);
router.get('/staffs/home', home.renderHome_staff);

//Trang order
router.get('/staffs/order', order.renderOrder);
router.post('/addOrder', order.orderAdd);

export default router;