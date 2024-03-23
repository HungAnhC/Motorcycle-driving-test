-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 23, 2024 lúc 02:59 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `restful_api_php`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `question`
--

CREATE TABLE `question` (
  `question_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `answer_a` varchar(255) NOT NULL,
  `answer_b` varchar(255) NOT NULL,
  `answer_c` varchar(255) DEFAULT NULL,
  `answer_d` varchar(255) DEFAULT NULL,
  `correct_answer` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `question`
--

INSERT INTO `question` (`question_id`, `title`, `answer_a`, `answer_b`, `answer_c`, `answer_d`, `correct_answer`) VALUES
(1, 'Hành vi sử dụng xe mô tô để kéo, đẩy xe mô tô khác bị hết xăng đến trạm mua xăng có được phép hay không ?', 'Chỉ được kéo nếu đã nhìn thấy trạm xăng.', 'Chỉ được thực hiện trên đường vắng phương tiện cùng tham gia giao thông.', 'Không được phép.', NULL, 'c'),
(2, '“Phương tiện tham gia giao thông đường bộ” gồm những loại nào ?', 'Phương tiện giao thông cơ giới đường bộ.', 'Phương tiện giao thông thô sơ đường bộ và xe máy chuyên dùng', 'Cả ý 1 và ý 2 đúng.', 'Cả ý 1 và ý 2 sai.', 'c'),
(6, 'Phần của đường bộ được sử dụng cho các phương tiện giao thông qua lại là gì ?', 'Phần mặt đường và lề đường.', 'Phần đường xe chạy.', 'Phần đường xe cơ giới.', 'Tất cả đều đúng', 'b'),
(7, '“Phương tiện tham gia giao thông đường bộ” gồm những loại nào ?', 'Phương tiện giao thông cơ giới đường bộ.', 'Phương tiện giao thông thô sơ đường bộ và xe máy chuyên dùng.', 'a và b đều sai', 'a và b đều đúng', 'b'),
(8, 'Sử dụng rượu bia khi lái xe, nếu bị phát hiện thì bị xử lý như thế nào ?', 'Chỉ bị nhắc nhở.', 'Bị xử phạt hành chính hoặc có thể bị xử lý hình sự tùy theo mức độ vi phạm.', ' Không bị xử lý hình sự.', 'a và b đều đúng', 'b'),
(9, 'Bạn đang lái xe phía trước có một xe cứu thương đang phát tín hiệu ưu tiên bạn có được phép vượt hay không ?', 'Không được vượt.', 'Được vượt khi đang đi trên cầu.', ' Được phép vượt khi đi qua nơi giao nhau có ít phương tiện cùng tham gia giao thông.', 'Được vượt khi đảm bảo an toàn.', 'a'),
(10, '* Hành vi sử dụng xe mô tô để kéo, đẩy xe mô tô khác bị hết xăng đến trạm mua xăng có được phép hay không ?', 'Chỉ được kéo nếu đã nhìn thấy trạm xăng.', 'Chỉ được thực hiện trên đường vắng phương tiện cùng tham gia giao thông.', ' Không được phép.', 'Cả a và b đều đúng', 'c'),
(11, 'Biển báo hiệu hình tròn có nền xanh lam có hình vẽ màu trắng là loại biển gì dưới đây ?', 'Biển báo nguy hiểm.', 'Biển báo cấm.', ' Biển báo hiệu lệnh phải thi hành.', 'Biển báo chỉ dẫn.', 'd'),
(12, 'Bạn đang lái xe trong khu vực đô thị từ 22 giờ đến 5 giờ sáng hôm sau và cần vượt một xe khác, bạn cần báo hiệu như thế nào để đảm bảo an toàn giao thông ?', 'Phải báo hiệu bằng đèn hoặc còi;', 'Chỉ được báo hiệu bằng còi.', ' Phải báo hiệu bằng cả còi và đèn.', 'Chỉ được báo hiệu bằng đèn.', 'c'),
(13, 'Người điều khiển phương tiện tham gia giao thông trong hầm đường bộ ngoài việc phải tuân thủ các quy tắc giao thông còn phải thực hiện những quy định nào dưới đây ?', 'Xe cơ giới, xe máy chuyên dùng phải bật đèn; xe thô sơ phải bật đèn hoặc có vật phát sáng báo hiệu; chỉ được dừng xe, đỗ xe ở nơi quy định.;', 'Xe cơ giới phải bật đèn ngay cả khi đường hầm sáng; phải cho xe chạy trên một làn đường và chỉ chuyển làn ở nơi được phép; được quay đầu xe, lùi xe khi cần thiết.', ' Xe máy chuyên dùng phải bật đèn ngay cả khi đường hầm sáng; phải cho xe chạy trên một làn đường và chỉ chuyển làn ở nơi được phép; được quay đầu xe, lùi xe khi cần thiết.', 'Tất cả đều sai', 'c'),
(14, 'Người điều khiển phương tiện tham gia giao thông trong hầm đường bộ ngoài việc phải tuân thủ các quy tắc giao thông còn phải thực hiện những quy định nào dưới đây ?', 'Xe cơ giới, xe máy chuyên dùng phải bật đèn; xe thô sơ phải bật đèn hoặc có vật phát sáng báo hiệu; chỉ được dừng xe, đỗ xe ở nơi quy định.;', ' Xe máy chuyên dùng phải bật đèn ngay cả khi đường hầm sáng; phải cho xe chạy trên một làn đường và chỉ chuyển làn ở nơi được phép; được quay đầu xe, lùi xe khi cần thiết.', '', '', 'b');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`question_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `question`
--
ALTER TABLE `question`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
