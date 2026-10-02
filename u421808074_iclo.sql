-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Waktu pembuatan: 02 Okt 2026 pada 07.37
-- Versi server: 11.8.9-MariaDB-log
-- Versi PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u421808074_iclo`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `author_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `excerpt` text DEFAULT NULL,
  `cover_image` varchar(255) DEFAULT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'draft',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `articles`
--

INSERT INTO `articles` (`id`, `author_id`, `title`, `slug`, `content`, `excerpt`, `cover_image`, `published_at`, `status`, `created_at`, `updated_at`, `category_id`) VALUES
(10, 2, 'Occupational Safety and Health in Artisanal and Small-Scale Mining (ASM): Building Safer and More Sustainable Mining Communities', 'occupational-safety-and-health-in-artisanal-and-small-scale-mining-asm-building-safer-and-more-sustainable-mining-communities', '<p class=\"MsoNormal\" style=\"mso-pagination: widow-orphan; layout-grid-mode: char; mso-layout-grid-align: none;\"><span lang=\"EN-US\" style=\"font-size: 12.0pt; font-family: \'Avenir Book\'; mso-fareast-font-family: SimSun; mso-bidi-font-family: \'Avenir Book\'; mso-font-kerning: 0pt; mso-bidi-language: AR;\">According to the World Bank\'s DELVE Initiative (2024), Artisanal and Small-Scale Mining (ASM) provides direct employment for approximately 45 million people globally, while supporting the livelihoods of an estimated 315 million people through direct and indirect economic activities (</span><span lang=\"EN-US\"><a href=\"https://egps.worldbank.org/programs/asm\"><span style=\"font-size: 12.0pt; font-family: \'Avenir Book\'; mso-fareast-font-family: SimSun; mso-bidi-font-family: \'Avenir Book\'; mso-font-kerning: 0pt; mso-bidi-language: AR;\">https://egps.worldbank.org/programs/asm</span></a></span><span lang=\"EN-US\" style=\"font-size: 12.0pt; font-family: \'Avenir Book\'; mso-fareast-font-family: SimSun; mso-bidi-font-family: \'Avenir Book\'; mso-font-kerning: 0pt; mso-bidi-language: AR;\">). ASM is a major producer of gold, tin, cobalt, tantalum, gemstones, and other critical minerals that are increasingly essential for global industrial development and the energy transition.</span></p>\r\n<p style=\"text-align: justify; text-justify: inter-ideograph; layout-grid-mode: char; mso-layout-grid-align: none;\"><span lang=\"EN-US\" style=\"font-family: \'Avenir Book\'; mso-bidi-font-family: \'Avenir Book\';\">&nbsp;</span></p>\r\n<p style=\"text-align: justify; text-justify: inter-ideograph; layout-grid-mode: char; mso-layout-grid-align: none;\"><span lang=\"EN-US\" style=\"font-family: \'Avenir Book\'; mso-bidi-font-family: \'Avenir Book\';\">Despite its socio-economic importance, ASM remains one of the world\'s most hazardous occupations, with workers frequently exposed to mine collapses, unstable excavations, hazardous chemicals such as mercury, silica dust, excessive physical workloads, inadequate personal protective equipment, and limited access to occupational health services. Strengthening Occupational Safety and Health (OSH) is therefore essential not only to protect workers\' lives but also to improve productivity, reduce operational risks, and support the long-term sustainability of mining communities.</span></p>\r\n<p style=\"text-align: justify; text-justify: inter-ideograph; layout-grid-mode: char; mso-layout-grid-align: none;\"><span lang=\"EN-US\" style=\"font-family: \'Avenir Book\'; mso-bidi-font-family: \'Avenir Book\';\">&nbsp;</span></p>\r\n<p><span lang=\"EN-US\" style=\"font-size: 10.5pt; mso-bidi-font-size: 12.0pt; font-family: \'Avenir Book\'; mso-fareast-font-family: SimSun; mso-fareast-theme-font: minor-fareast; mso-bidi-font-family: \'Avenir Book\'; mso-font-kerning: 1.0pt; mso-ansi-language: EN-US; mso-fareast-language: ZH-CN; mso-bidi-language: AR-SA;\">Recognising these challenges, the international community has developed a number of frameworks that place OSH at the centre of responsible mining. The <strong><span style=\"font-family: \'Avenir Book\'; mso-bidi-font-family: \'Avenir Book\';\">ILO Safety and Health in Mines Convention, 1995 (No. 176)</span></strong> establishes internationally recognised principles for safe mining operations, while the <strong><span style=\"font-family: \'Avenir Book\'; mso-bidi-font-family: \'Avenir Book\';\">ILO Code of Practice on Safety and Health in Opencast Mines</span></strong> and the <strong><span style=\"font-family: \'Avenir Book\'; mso-bidi-font-family: \'Avenir Book\';\">ILO Handbook on Safety and Health in Small-Scale Surface Mines</span></strong> provide practical guidance on hazard identification, risk assessment, emergency preparedness, worker participation, and safe mining practices suitable for ASM. In parallel, the <strong><span style=\"font-family: \'Avenir Book\'; mso-bidi-font-family: \'Avenir Book\';\">OECD Due Diligence Guidance for Responsible Mineral Supply Chains</span></strong> and other responsible sourcing initiatives increasingly recognise safe and healthy working conditions as a core element of responsible business conduct, human rights due diligence, and sustainable mineral supply chains.</span></p>\r\n<p style=\"text-align: justify; text-justify: inter-ideograph; layout-grid-mode: char; mso-layout-grid-align: none;\"><span lang=\"EN-US\" style=\"font-family: \'Avenir Book\'; mso-bidi-font-family: \'Avenir Book\';\">In Indonesia, the importance of strengthening OSH in ASM has become increasingly relevant with the enactment of <strong><span style=\"font-family: \'Avenir Book\'; mso-bidi-font-family: \'Avenir Book\';\">Law No. 2 of 2025</span></strong>, amending the Mineral and Coal Mining Law (UU Minerba). The law further reinforces the government\'s commitment to formalising community mining through <strong><span style=\"font-family: \'Avenir Book\'; mso-bidi-font-family: \'Avenir Book\';\">People\'s Mining Areas (Wilayah Pertambangan Rakyat &ndash; WPR)</span></strong> and <strong><span style=\"font-family: \'Avenir Book\'; mso-bidi-font-family: \'Avenir Book\';\">People\'s Mining Permits (Izin Pertambangan Rakyat &ndash; IPR)</span></strong>. This policy creates an important opportunity for local communities, cooperatives, and small-scale miners to operate legally while improving governance, environmental management, and social performance. However, formalisation should not be viewed merely as a licensing process. It must also ensure that legal mining becomes <strong><span style=\"font-family: \'Avenir Book\'; mso-bidi-font-family: \'Avenir Book\';\">safe mining</span></strong>, where miners have the knowledge, systems, and resources to identify hazards, manage occupational risks, respond to emergencies, and protect their health and wellbeing. Supported by Indonesia\'s broader legal framework&mdash;including <strong><span style=\"font-family: \'Avenir Book\'; mso-bidi-font-family: \'Avenir Book\';\">Law No. 1 of 1970 on Occupational Safety</span></strong>, <strong><span style=\"font-family: \'Avenir Book\'; mso-bidi-font-family: \'Avenir Book\';\">Government Regulation No. 96 of 2021</span></strong>, and regulations promoting <strong><span style=\"font-family: \'Avenir Book\'; mso-bidi-font-family: \'Avenir Book\';\">Good Mining Practice (GMP)</span></strong>&mdash;OSH should become a fundamental pillar of Indonesia\'s ASM development.</span></p>\r\n<p style=\"text-align: justify; text-justify: inter-ideograph; layout-grid-mode: char; mso-layout-grid-align: none;\"><span lang=\"EN-US\" style=\"font-family: \'Avenir Book\'; mso-bidi-font-family: \'Avenir Book\';\">&nbsp;</span></p>\r\n<p style=\"text-align: justify; text-justify: inter-ideograph; layout-grid-mode: char; mso-layout-grid-align: none;\"><span lang=\"EN-US\" style=\"font-family: \'Avenir Book\'; mso-bidi-font-family: \'Avenir Book\';\">Achieving this vision requires collaboration between government, mining cooperatives, local communities, industry, academia, and development partners. Beyond regulatory compliance, strengthening OSH in ASM demands practical solutions such as competency development, risk assessments, safer mining technologies, occupational health programmes, institutional strengthening, and the cultivation of a preventive safety culture that empowers miners to work safely every day.</span></p>\r\n<p style=\"text-align: justify; text-justify: inter-ideograph; layout-grid-mode: char; mso-layout-grid-align: none;\"><span lang=\"EN-US\" style=\"font-family: \'Avenir Book\'; mso-bidi-font-family: \'Avenir Book\';\">As the <strong><span style=\"font-family: \'Avenir Book\'; mso-bidi-font-family: \'Avenir Book\';\">Indonesian Centre for Labour and Occupational Safety and Health (ICLO)</span></strong>, we are committed to supporting the transformation of Indonesia\'s ASM sector into one that is safer, healthier, and more sustainable. ICLO provides research and policy studies, OSH baseline assessments, workplace and mining risk assessments, competency-based training, institutional capacity building, and technical advisory services for governments, mining cooperatives, companies, and development organisations. By integrating international good practices with Indonesia\'s evolving regulatory framework, ICLO helps ensure that the implementation of <strong><span style=\"font-family: \'Avenir Book\'; mso-bidi-font-family: \'Avenir Book\';\">WPR</span></strong> and <strong><span style=\"font-family: \'Avenir Book\'; mso-bidi-font-family: \'Avenir Book\';\">IPR</span></strong> not only strengthens legal certainty but also promotes safer workplaces, protects miners\' wellbeing, and advances responsible and sustainable artisanal and small-scale mining across Indonesia.</span></p>', NULL, 'https://iclo.co.id/uploads/covers/1785292002_5zjC2haa.png', '2026-07-29 02:26:42', 'published', '2026-07-29 02:26:42', '2026-07-29 02:26:42', 1),
(11, 2, 'Workforce Diversity, Equity & Inclusion (DEI) Diagnostics', 'workforce-diversity-equity-inclusion-dei-diagnostics', '<p>Creating an inclusive workplace is no longer solely an HR priority, it has become a strategic business imperative closely linked to organisational performance, ESG, responsible business conduct (RBC), and long-term sustainability. Increasingly, investors, regulators, customers, and global supply chain partners expect organisations to demonstrate how they promote diversity, equity, and inclusion (DEI) while preventing discrimination and ensuring equal opportunity across their operations and value chains.</p>\r\n<p>These expectations are reflected in international frameworks such as the UN Guiding Principles on Business and Human Rights (UNGPs), the OECD Guidelines for Multinational Enterprises on Responsible Business Conduct, the ILO Fundamental Principles and Rights at Work, the ILO Violence and Harassment Convention, 2019 (No. 190), the UN Sustainable Development Goals (SDGs), and evolving Human Rights Due Diligence (HRDD) and ESG requirements. In Indonesia, these commitments are increasingly reinforced through national labour legislation, anti-discrimination provisions, disability inclusion policies, gender equality initiatives, and the National Strategy on Business and Human Rights (Stranas BHAM), encouraging organisations to strengthen inclusive and equitable workplaces.</p>\r\n<p>ICLO supports organisations through independent, evidence-based assessments that evaluate workforce diversity, equity, and inclusion across organisational policies, governance systems, management practices, and employee experiences. Using workforce data analysis, employee perception surveys, interviews, focus group discussions, document reviews, and organisational diagnostics, we identify inclusion gaps, psychosocial barriers, and systemic risks while providing practical recommendations to strengthen governance, employee engagement, and organisational performance.</p>\r\n<p>Our assessments cover strategic issues including gender equality, equal employment opportunity, disability inclusion, indigenous peoples and local employment, workplace culture, psychological safety, leadership diversity, career progression, employee engagement, and inclusive organisational practices. The findings enable organisations to strengthen workforce strategies, enhance ESG performance, support HRDD implementation, and demonstrate alignment with international responsible business expectations while improving organisational resilience and employer reputation.</p>\r\n<p>ICLO provides tailored Workforce Diversity &amp; Inclusion Assessments, DEI diagnostics, employee perception surveys, policy and governance reviews, organisational benchmarking, and strategic roadmaps to help organisations build more inclusive, resilient, and high-performing workplaces that meet both international expectations and Indonesia\'s evolving regulatory landscape.</p>', 'Building an inclusive workplace is now an essential business strategy. ICLO helps your company conduct DEI assessments to optimize ESG performance and regulatory compliance.', 'https://iclo.co.id/uploads/covers/1785638235_RKd9KUjR.png', '2026-08-02 02:37:37', 'published', '2026-08-02 02:37:15', '2026-08-02 02:37:37', 3),
(12, 2, 'Your ESG Performance Is Only as Strong as Your Suppliers', 'your-esg-performance-is-only-as-strong-as-your-suppliers', '<p>Most companies invest heavily in improving their own ESG performance, Occupational Safety and Health (OSH), and sustainability programmes. They develop policies, establish governance systems, publish sustainability reports, and strengthen internal compliance. Yet one critical question often remains unanswered:&nbsp;</p>\r\n<p>Are their suppliers and contractors ready to meet the same standards?</p>\r\n<p>For many organisations, the greatest ESG, labour, and operational risks no longer originate within their own facilities, they exist across their supply chains. A contractor with weak safety practices, a supplier with poor labour standards, or a subcontractor lacking environmental controls can expose a company to operational disruption, reputational damage, regulatory scrutiny, and commercial risk. In today\'s interconnected economy, a company\'s reputation is increasingly defined not only by what it does, but also by the practices of those it chooses to do business with.</p>\r\n<p>This challenge is particularly significant in Indonesia. More than 65 million Small and Medium-sized Enterprises (SMEs/UMKM) contribute over 60% of the national GDP and employ approximately 97% of the country\'s workforce. They provide construction services, logistics, engineering, manufacturing, maintenance, security, transportation, labour supply, catering, and countless other services that keep Indonesia\'s major industries operating. In reality, SMEs are not simply supporting businesses, they are the engine that drives Indonesia\'s supply chains.</p>\r\n<p>At the same time, global expectations are changing rapidly. International frameworks such as the UN Guiding Principles on Business and Human Rights (UNGPs), the OECD Guidelines for Responsible Business Conduct, emerging Human Rights Due Diligence (HRDD) legislation, and growing ESG disclosure requirements are transforming how companies manage supplier relationships. Procurement decisions are increasingly influenced not only by cost and quality, but also by how suppliers protect workers, manage health and safety, minimise environmental impacts, and demonstrate responsible business practices.</p>\r\n<p>For Indonesian companies, this is no longer merely a compliance issue. It has become a business imperative. Organisations that cannot demonstrate responsible supply chain management may face increasing pressure from investors, customers, regulators, lenders, certification schemes, and international business partners. Conversely, companies that develop capable, responsible suppliers are better positioned to strengthen resilience, improve operational performance, and remain competitive in global markets.</p>\r\n<p>The challenge, however, is rarely one of commitment, it is one of capability. Most Indonesian SMEs possess strong technical expertise within their respective industries, yet many have had limited opportunities to build knowledge in Occupational Safety and Health, Responsible Business Conduct, Human Rights Due Diligence, labour compliance, environmental management, contractor governance, or modern slavery risk prevention. As a result, suppliers are often expected to satisfy increasingly sophisticated customer requirements without receiving the practical guidance, systems, or capacity building necessary to achieve them.</p>\r\n<p>This is why leading companies around the world are changing their approach. Rather than relying solely on supplier audits to identify non-compliance, they are investing in supplier capability development. Through structured training, coaching, mentoring, and continuous improvement programmes, businesses are helping suppliers strengthen their own management systems, improve workplace safety, enhance labour practices, and integrate ESG principles into daily operations. Supplier development is increasingly recognised as one of the most effective ways to reduce supply chain risk while creating long-term business value for both buyers and suppliers.</p>\r\n<p>Indonesia stands at a strategic moment. As the country strengthens its position in critical minerals, manufacturing, infrastructure, renewable energy, and other globally connected industries, the capability of local suppliers will become an increasingly important competitive advantage. Companies seeking to build resilient supply chains will need suppliers that are not only technically competent, but also capable of meeting international expectations on labour standards, occupational safety, environmental stewardship, and responsible business conduct.</p>\r\n<p>At the Indonesian Centre for Labour and Occupational Safety and Health (ICLO), we believe that stronger supply chains begin with stronger suppliers. Our mission is to bridge the gap between global expectations and practical implementation by helping companies and SMEs build the capabilities needed to succeed in today\'s evolving business landscape. Through executive learning, supplier and contractor development programmes, advisory services, risk assessments, and practical training on Responsible Business Conduct, Occupational Safety and Health, Human Rights Due Diligence, ESG, labour compliance, and modern slavery prevention, ICLO works alongside organisations to transform responsible business principles into measurable business performance.</p>\r\n<p>Building supplier capability is no longer a corporate social responsibility initiative, it is a strategic investment. Companies that invest in their suppliers today will be better prepared for tomorrow\'s regulatory expectations, investor scrutiny, customer requirements, and market opportunities. Responsible supply chains are built through partnership, continuous learning, and shared responsibility. By empowering Indonesian SMEs, companies are not only strengthening their own resilience, they are contributing to safer workplaces, more competitive industries, and a more sustainable Indonesian economy.</p>\r\n<p>Because the future of responsible business is not determined by the strength of one company alone, but by the strength of every supplier within its supply chain</p>', 'Your ESG performance is only as strong as your suppliers. Discover why shifting from supplier audits to capability development in OSH and labor standards is a critical business imperative in Indonesia.', 'https://iclo.co.id/uploads/covers/1785672208_U347oeYR.jpeg', '2026-08-02 12:04:13', 'published', '2026-08-02 12:03:28', '2026-08-02 12:04:13', 3),
(13, 2, 'Psychosocial Risks in the Workplace', 'psychosocial-risks-in-the-workplace', '<p style=\"text-align: justify; text-justify: inter-ideograph;\"><span lang=\"EN-US\" style=\"font-family: \'Times New Roman Regular\';\">For decades, occupational safety and health (OSH) has been associated with preventing physical injuries, occupational diseases, and unsafe working conditions. While these remain fundamental, the world of work has changed significantly. Today\'s organisations face growing challenges arising from psychosocial hazards, including excessive workload, poor job design, workplace bullying and harassment, organisational change, job insecurity, long working hours, digital connectivity, and blurred work-life boundaries. These risks are increasingly affecting employee wellbeing, operational performance, and organisational resilience.</span></p>\r\n<p style=\"text-align: justify; text-justify: inter-ideograph;\"><span lang=\"EN-US\" style=\"font-family: \'Times New Roman Regular\';\">Psychosocial risk is no longer simply a human resources or employee wellbeing issue. It is a business risk. Evidence consistently shows that unmanaged psychosocial hazards contribute to higher absenteeism, presenteeism, burnout, turnover, safety incidents, reduced productivity, increased healthcare costs, and declining employee engagement. In high-risk sectors, psychosocial factors may also influence human error, decision-making, and workplace safety outcomes, reinforcing the close relationship between mental wellbeing and overall organisational performance.</span></p>\r\n<p style=\"text-align: justify; text-justify: inter-ideograph;\"><span lang=\"EN-US\" style=\"font-family: \'Times New Roman Regular\';\">Recognising these challenges, the <strong><span style=\"font-family: \'Times New Roman Regular\'; font-weight: normal;\">International Labour Organization (ILO)</span></strong> continues to advocate for safe and healthy working environments that protect both physical and mental health. </span><span lang=\"EN-US\">The <strong><span style=\"font-weight: normal;\">World Day for Safety and Health at Work</span></strong></span><span lang=\"EN-US\" style=\"font-family: \'Times New Roman Regular\';\"> has increasingly highlighted how technological change, digitalisation, climate transitions, and evolving forms of work require organisations to address emerging psychosocial risks alongside traditional occupational hazards. Likewise, <strong><span style=\"font-family: \'Times New Roman Regular\'; font-weight: normal;\">ISO 45003:2021</span></strong> provides the first internationally recognised guidance for integrating psychological health and safety into occupational health and safety management systems, complementing <strong><span style=\"font-family: \'Times New Roman Regular\'; font-weight: normal;\">ISO 45001</span></strong> and reinforcing that psychosocial risk management should become part of mainstream organisational governance.</span></p>\r\n<p style=\"text-align: justify; text-justify: inter-ideograph;\"><span lang=\"EN-US\" style=\"font-family: \'Times New Roman Regular\';\">Indonesia is also moving towards a more comprehensive approach to workplace health. National legislation, including <strong><span style=\"font-family: \'Times New Roman Regular\'; font-weight: normal;\">Law No. 1 of 1970 on Occupational Safety</span></strong>, <strong><span style=\"font-family: \'Times New Roman Regular\'; font-weight: normal;\">Government Regulation No. 50 of 2012 on the Occupational Safety and Health Management System (SMK3)</span></strong>, and <strong><span style=\"font-family: \'Times New Roman Regular\'; font-weight: normal;\">Minister of Manpower Regulation No. 5 of 2018 on Occupational Safety and Health in the Work Environment, </span></strong>provides an important foundation for strengthening occupational health beyond physical hazards. As organisations respond to evolving ESG expectations, responsible business conduct, and global supply chain requirements, psychosocial risk management is becoming an increasingly important indicator of organisational maturity and governance.</span></p>\r\n<p style=\"text-align: justify; text-justify: inter-ideograph;\"><span lang=\"EN-US\" style=\"font-family: \'Times New Roman Regular\';\">Leading organisations are therefore shifting from reactive mental health initiatives towards proactive psychosocial risk management. Rather than responding only after employees experience stress or burnout, organisations are embedding psychosocial considerations into leadership, work design, organisational culture, risk management, and decision-making. This preventive approach not only protects workers but also enhances productivity, innovation, workforce retention, and long-term business resilience.</span></p>\r\n<p style=\"text-align: justify; text-justify: inter-ideograph;\"><span lang=\"EN-US\" style=\"font-family: \'Times New Roman Regular\';\">At the same time, investors, regulators, customers, and employees are placing greater emphasis on the \"Social\" dimension of ESG. Organisations are increasingly expected to demonstrate how they manage workforce wellbeing, psychological safety, diversity and inclusion, respectful workplaces, and healthy organisational cultures. Mental health is no longer viewed as a standalone wellness programme&mdash;it has become a governance issue that influences corporate reputation, talent attraction, operational continuity, and sustainable business performance.</span></p>\r\n<p style=\"text-align: justify; text-justify: inter-ideograph;\"><span lang=\"EN-US\" style=\"font-family: \'Times New Roman Regular\';\">At the <strong><span style=\"font-family: \'Times New Roman Regular\'; font-weight: normal;\">Indonesian Centre for Labour and Occupational Safety and Health (ICLO)</span></strong>, we help organisations move beyond awareness towards practical implementation. Our services include psychosocial risk assessments, workplace mental health diagnostics, organisational stress assessments, psychosocial hazard mapping, ISO 45003 implementation support, policy and procedure development, leadership capability programmes, employee awareness training, organisational culture assessments, and integration of psychosocial risks into SMK3, ESG, and enterprise risk management systems. Our approach combines international standards, scientific evidence, and practical workplace solutions tailored to the Indonesian context.</span></p>\r\n<p style=\"text-align: justify; text-justify: inter-ideograph;\"><span lang=\"EN-US\" style=\"font-family: \'Times New Roman Regular\';\">The future of occupational safety is no longer defined solely by preventing accidents, it is about creating workplaces where people can perform, innovate, and thrive. Organisations that proactively manage psychosocial risks will be better positioned to strengthen workforce resilience, improve business performance, meet evolving ESG expectations, and build sustainable organisations for the future.</span></p>', 'Pelajari mengapa manajemen risiko psikososial dan kesehatan mental di tempat kerja kini menjadi prioritas utama K3 dan ESG. Temukan solusi ISO 45003 bersama ICLO.', 'https://iclo.co.id/uploads/covers/1785943455_Ljww82Qd.png', '2026-08-05 15:25:34', 'published', '2026-08-05 15:24:15', '2026-08-05 15:25:34', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `authors`
--

CREATE TABLE `authors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `bio` text DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `authors`
--

INSERT INTO `authors` (`id`, `name`, `email`, `bio`, `avatar`, `created_at`, `updated_at`) VALUES
(2, 'Dr. Unang Mulkhan', 'unangmulkhan@iclo.co.id', 'Lead Academic ICLO, peneliti senior tata kelola K3 nasional, dan konsultan integrasi standar ketenagakerjaan dalam kerangka ESG.', NULL, '2026-07-19 17:25:15', '2026-08-02 11:40:59'),
(3, 'Bapak Abdul Darda, SH., MH', 'darda.a@iclo.or.id', 'Konsultan senior kebijakan publik dan auditor SMK3 yang tersertifikasi Kemenaker RI dengan fokus mitigasi risiko kecelakaan kerja.', NULL, '2026-07-19 17:25:15', '2026-07-19 17:25:15'),
(5, 'dr. Era Catur Prasetya, Sp.KJ', 'eracaturprasetya@iclo.co.id', NULL, NULL, '2026-08-05 15:19:51', '2026-08-05 15:19:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel-cache-770d3dca27ffb46d67d1b0a5eddd30e51ad1e371', 'i:1;', 1788337697),
('laravel-cache-770d3dca27ffb46d67d1b0a5eddd30e51ad1e371:timer', 'i:1788337697;', 1788337697),
('laravel-cache-7c53297c94ca1790d74f989a404646c1fb1fcb65', 'i:1;', 1790472472),
('laravel-cache-7c53297c94ca1790d74f989a404646c1fb1fcb65:timer', 'i:1790472472;', 1790472472),
('laravel-cache-7fa6b2ca5b99fcab4357dfb7f1cc4e58c2f53b6f', 'i:1;', 1787093635),
('laravel-cache-7fa6b2ca5b99fcab4357dfb7f1cc4e58c2f53b6f:timer', 'i:1787093635;', 1787093635);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'K3', 'k3', '2026-07-19 17:40:07', '2026-07-19 17:40:07'),
(2, 'Hukum', 'hukum', '2026-07-19 17:40:14', '2026-07-19 17:40:14'),
(3, 'ESG and Sustainability', 'esg-and-sustainability', '2026-08-02 02:35:08', '2026-08-02 02:35:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `contact_submissions`
--

CREATE TABLE `contact_submissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `company` varchar(255) DEFAULT NULL,
  `sector` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` varchar(255) NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` smallint(5) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_07_03_000000_create_authors_table', 1),
(5, '2026_07_03_000001_create_articles_table', 1),
(6, '2026_07_06_145257_create_resources_table', 1),
(7, '2026_07_09_025457_add_category_to_articles_table', 1),
(8, '2026_07_09_030220_create_categories_table', 1),
(9, '2026_07_09_030242_update_articles_category_to_category_id', 1),
(10, '2026_07_11_133300_create_contact_submissions_table', 1),
(11, '2026_07_11_141854_create_resource_categories_table', 1),
(12, '2026_07_11_141932_update_resources_table_category', 1),
(13, '2026_07_19_152256_create_sectors_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `resources`
--

CREATE TABLE `resources` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `author_id` bigint(20) UNSIGNED DEFAULT NULL,
  `resource_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `external_link` varchar(255) DEFAULT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `resource_categories`
--

CREATE TABLE `resource_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `resource_categories`
--

INSERT INTO `resource_categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Laporan', 'laporan', '2026-07-20 06:09:47', '2026-07-20 06:09:47'),
(2, 'Penelitian', 'penelitian', '2026-07-20 06:10:06', '2026-07-20 06:10:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sectors`
--

CREATE TABLE `sectors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_id` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sectors`
--

INSERT INTO `sectors` (`id`, `name_id`, `name_en`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Pertambangan Nikel & Ekstraksi', 'Nickel Mining & Extraction', 'mining', '2026-07-19 17:25:15', '2026-07-19 17:25:15'),
(2, 'Smelter & Metalurgi', 'Smelters & Metallurgy', 'smelter', '2026-07-19 17:25:15', '2026-07-19 17:25:15'),
(3, 'Minyak Sawit & Perkebunan', 'Palm Oil & Plantations', 'palmoil', '2026-07-19 17:25:15', '2026-07-19 17:25:15'),
(4, 'Manufaktur & Pabrik', 'Manufacturing & Factories', 'manufacturing', '2026-07-19 17:25:15', '2026-07-19 17:25:15'),
(5, 'Energi & Pembangkit Listrik', 'Energy & Power Plants', 'energy', '2026-07-19 17:25:15', '2026-07-19 17:25:15'),
(6, 'Lainnya / Konsultasi Kebijakan', 'Other / Policy Consultations', 'other', '2026-07-19 17:25:15', '2026-07-19 17:25:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('2PrTaxFlGwv1kl9rXN9RUQuYTQyIxWtzP5hUCW91', NULL, '2a02:4780:6:c0de::8', 'Go-http-client/2.0', 'eyJfdG9rZW4iOiJTZ2cxcEZOc0tCUjV5MUF5dGdseTZnM1RVQnEyR1RwekdLa0J2UWZlIiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1790786857),
('3ciE5tLErCeSyS4kAFngc8VUniARRiJ0iQNybq8p', NULL, '2a03:2880:f80e:31::', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 (compatible; meta-externalagent/1.1 (+https://developers.facebook.com/docs/sharing/webmasters/crawler))', 'eyJfdG9rZW4iOiJvalZ2TWUwNjU4anFtMFlsU0FPWWVwOTViMXpQSmRhRXBLTHRrVHZjIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC93d3cuaWNsby5jby5pZCIsInJvdXRlIjoiaG9tZSJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19', 1790819381),
('5dHQG5ZtbvA9rI4N6HdJSvr4jLdXCzcbDFhpHvR4', NULL, '2a02:4780:6:c0de::8', 'Go-http-client/2.0', 'eyJfdG9rZW4iOiIxeVI5a25uT0IxVjZ0MlR3dzJpejJOcVdLSGo2Z1FVMFZ6RG03YnFvIiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1790857910),
('7rzAmnnjt6Hn70R7vLiDEnNm5Mqnvhu5IOZiMif6', NULL, '172.197.160.195', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko); compatible; ChatGPT-User/1.0; +https://openai.com/bot', 'eyJfdG9rZW4iOiJoWTUyc215UzVDODl2TVhuY1N3MXR0TzFSVGR6Y3BoZ2I0UTJsclA3IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9pY2xvLmNvLmlkIiwicm91dGUiOiJob21lIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=', 1790822672),
('8dWGAkISeC74BdB2CtbWsF9gsa8fXHlrbt3XZELH', NULL, '182.253.228.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiIzaDY2T0twbXRWUWFyeGxQazVtTlNWZWxXT0FlMFFIYjNtTkJUelpLIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9pY2xvLmNvLmlkIiwicm91dGUiOiJob21lIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=', 1790798900),
('9GunZfIAuwgvckapvj62WXcoSo8IQQ6ahNckLnWm', NULL, '52.167.144.169', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'eyJfdG9rZW4iOiJSYkFzYkZLUG9UaEwwWXlidklNcm9reWQ0cEVwbEJocXJPSkdMRGRkIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC93d3cuaWNsby5jby5pZFwvZXhwZXJ0c1wvYWJkdWwtZGFyZGEiLCJyb3V0ZSI6ImV4cGVydHMuc2hvdyJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19', 1790890725),
('A4xqXgT3VdmrAOkpcn5qX50HhL3IKinLHbUXZymu', NULL, '172.197.160.200', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko); compatible; ChatGPT-User/1.0; +https://openai.com/bot', 'eyJfdG9rZW4iOiJGMDNnU3c0czlCaGdPdkN0cHp5YmFiRXRUZnkyelkybGZPWnZrSnRPIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9pY2xvLmNvLmlkIiwicm91dGUiOiJob21lIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=', 1790848347),
('abtKnuN0iplGo0XyqkYJz035WmUfayO4dVDcxw71', NULL, '2001:4860:7:506::ee', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJGSlpNb05adHZSTzkzQUxXclVuUWlqdGtia1hlR3JYcjlaalZ2SndDIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9pY2xvLmNvLmlkIiwicm91dGUiOiJob21lIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=', 1790848269),
('AwyD70Af0qcUkMgZvT6qswvjhIcStmvx4bALmjNU', NULL, '20.172.182.212', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJySVFUVHl5N0RPZ2hESlV3WGZlVWNuUlk1RDBlMGtXcTVDU0h0UDBCIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC93d3cuaWNsby5jby5pZCIsInJvdXRlIjoiaG9tZSJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19', 1790822022),
('b2bMOU6B7NFibdL9SAaFWFmzN9Z8f8HAToiU6OhB', NULL, '172.197.160.195', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko); compatible; ChatGPT-User/1.0; +https://openai.com/bot', 'eyJfdG9rZW4iOiJJekhWZUkzZzdtVGwzZWJkOTZKRTBRVGFCUFV6S3B2TkxyY1RlQ0U0IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9pY2xvLmNvLmlkXC9zZWN0b3JzIiwicm91dGUiOiJzZWN0b3JzIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=', 1790856457),
('c50pGCYrylzZGRcFMvcDdB3wleO5aIwNbVoI0lmi', NULL, '20.172.182.212', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiI1SWRYU0F0M21WM3RoMW5hNU9XYmM3eHBMMk1ldm0yZlNYcjJkbWF1IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9pY2xvLmNvLmlkIiwicm91dGUiOiJob21lIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=', 1790822022),
('dLPz2jI7Qk2vnGB7xViJJHjt1TsLzL117MAvfEb5', NULL, '172.197.160.194', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko); compatible; ChatGPT-User/1.0; +https://openai.com/bot', 'eyJfdG9rZW4iOiJvZ2xjRUY4T2VtaTFJWG9yZERyTnNTaXUzWHdUM0ZmQXBReFZ3bU1NIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9pY2xvLmNvLmlkXC9leHBlcnRzXC91bmFuZy1tdWxraGFuIiwicm91dGUiOiJleHBlcnRzLnNob3cifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1790856464),
('dyssUIIWEIBc4XAvveSygwdCpB1XzObnJPIzcEh0', NULL, '172.197.160.193', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko); compatible; ChatGPT-User/1.0; +https://openai.com/bot', 'eyJfdG9rZW4iOiJtcXA5SUtEbEpRWWx6NFJNUFRSUUhwWTZqbjlHbUpXNkRRYkZwb3pGIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9pY2xvLmNvLmlkXC9zZWN0b3JzIiwicm91dGUiOiJzZWN0b3JzIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=', 1790848913),
('EpVvKyUt90uD8WNCgKAtgZQ8BCJAukJ9tuKzIvSk', NULL, '2a03:2880:6ff:2::', 'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)', 'eyJfdG9rZW4iOiJvR0o0aHBQVEZLVGNzdTY4enlPQmFmbGRZOFRVUHBFZUJUOWlwSnVQIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9pY2xvLmNvLmlkXC8/ZmJjbGlkPUl3WlhoMGJnTmhaVzBDTVRFQWNHUnZaZ1J6Y25SakJtRndjRjlwWkF3eU5UWXlPREV3TkRBMU5UZ0FBUjVPVjNlaGltdVJMYXNaNGlkSmdYVkVpVXp2WVIyRkVEc1ZVcVpBOHprNEZzTVRsbDBHSVNOUEpJVFpuZ19hZW1fZHpQaEp3X2Fic1RiOXVheVA5cUJxdyIsInJvdXRlIjoiaG9tZSJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19', 1790904173),
('fl0uIPoxHRmwTFUYGraerYZe28n07ojF86POPa5I', NULL, '172.197.160.197', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko); compatible; ChatGPT-User/1.0; +https://openai.com/bot', 'eyJfdG9rZW4iOiJRNU5VNEVaYkFNNzhLT0t2MDl0WDdHelZkb3dsc3JwS3VKekNoem9CIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9pY2xvLmNvLmlkXC9zZXJ2aWNlcyIsInJvdXRlIjoic2VydmljZXMifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1790856457),
('FlXaiYgUwVa9D3DXlfojGg8SRnCupZd34wckxJRU', NULL, '172.197.160.197', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko); compatible; ChatGPT-User/1.0; +https://openai.com/bot', 'eyJfdG9rZW4iOiJTRzVDRnhVcXFhSHJWSlNpZGkwckdOU0FOcTltOGhDdXhBdnlkTWtrIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9pY2xvLmNvLmlkXC9hYm91dCIsInJvdXRlIjoiYWJvdXQifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1790856457),
('GMyiegiMxRjJImMx90GjCv8z6tIXAureZ2aYYFO6', NULL, '2a03:2880:f80e:74::', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiI5M1V2WVFQUWJCWkMxekxmWEFId0tHbGVIbVE4OWlNRkc2eVNkTDB6IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9pY2xvLmNvLmlkXC8/ZmJjbGlkPUl3WlhoMGJnTmhaVzBDTVRFQWNHUnZaZ1J6Y25SakJtRndjRjlwWkF3eU5UWXlPREV3TkRBMU5UZ0FBUjVPVjNlaGltdVJMYXNaNGlkSmdYVkVpVXp2WVIyRkVEc1ZVcVpBOHprNEZzTVRsbDBHSVNOUEpJVFpuZ19hZW1fZHpQaEp3X2Fic1RiOXVheVA5cUJxdyIsInJvdXRlIjoiaG9tZSJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19', 1790904145),
('GtpyBKSydoLZwqapF73fJK0A0PNmEZ7pjhmUbTg1', NULL, '66.249.72.174', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.8010.52 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 'eyJfdG9rZW4iOiJIUFFDc3oybmZOVmowcEh4cHBUbWJPNW44QU1idnBxV1N5c3Z1R1dhIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC93d3cuaWNsby5jby5pZCIsInJvdXRlIjoiaG9tZSJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19', 1790795297),
('gVvjFSD0KKd2ShzkGgnLT76nqcC6hgtpgzR2aKim', NULL, '5.27.34.73', '', 'eyJfdG9rZW4iOiJGdlNzMjJZc1JVSnhBUkJsUExyTzZkOWd2RDNHdXljN0FkT1llT1c0IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9pY2xvLmNvLmlkXC9jb250YWN0Iiwicm91dGUiOiJjb250YWN0In0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=', 1790792516),
('h495EJdYKhnHPADhZFz9IWerhifdkCgpW6ToaxiE', NULL, '169.224.68.162', '', 'eyJfdG9rZW4iOiJhSnNCUUNuQWR6c0ZiQnE2VGhqY1BjZ2FuMkNFSnoza0hqREgwYTNJIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9pY2xvLmNvLmlkXC9hYm91dCIsInJvdXRlIjoiYWJvdXQifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1790792519),
('iliPubOJ4qcV0gi8ls4dV19S2yIYW6mEEHUdqjbd', NULL, '88.117.84.152', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJyQW5tcHNPZTVJck5tellXRTJ1QzVmODFCdmVuM0pYY2VTOUpXV1g1IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC93d3cuaWNsby5jby5pZCIsInJvdXRlIjoiaG9tZSJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19', 1790828725),
('IVlbUWK8WyCjpA6eliu3c6WU1YeyBjEeJpIDmZKL', NULL, '2001:4860:7:406::de', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiI0V3NBMUNrSkNxR29tcGxSYWoxTGNTa1NSWnNDUUoyUnZOT3lhamlvIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC93d3cuaWNsby5jby5pZFwvYWJvdXQiLCJyb3V0ZSI6ImFib3V0In0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=', 1790822613),
('jzyfT6LcTPlbF2t28R1sCUL8FfxainOojrMe67MW', NULL, '66.249.72.174', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 'eyJfdG9rZW4iOiJsS2lyT05OZHgxSDQ3ZGpldnpDTDhHOE5UM0sweDZWSVhXWXF6VFVYIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC93d3cuaWNsby5jby5pZCIsInJvdXRlIjoiaG9tZSJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19', 1790795309),
('kP0U4bJ8sm4L7CIN14t4hm4xz4VfdzzOZjQCZuzp', NULL, '172.197.160.195', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko); compatible; ChatGPT-User/1.0; +https://openai.com/bot', 'eyJfdG9rZW4iOiJ6YkU5RHlMWE9KalNYcTJjT2hPYWExaERkY2hmckhiazRtVGl6cm9wIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9pY2xvLmNvLmlkXC9leHBlcnRzXC9iYXl1LWFyaWUtZmlhbnRvIiwicm91dGUiOiJleHBlcnRzLnNob3cifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1790856464),
('LsvUn8bv0Jj2jwQfWzLeTw2s5vg0JMl2NH5nKCLN', NULL, '157.180.38.16', 'HunterLogosRobot/1.0 (+https://logos.hunter.io/robot)', 'eyJfdG9rZW4iOiJQUTBXb1RuT200YVg1SU01djBKSW9DNlZaY0laZzBlN01aUmNaWHQ2IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9pY2xvLmNvLmlkIiwicm91dGUiOiJob21lIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=', 1790874051),
('M9BllKb04ukg25eHUcPqLV9kCF2DBOJeysqAzNYz', NULL, '40.77.167.116', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'eyJfdG9rZW4iOiJEZTdPRGR3SENlaUtueGRZVTh4dVplWXJ1U1BFSzhRZG5HUjNuYzV4IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC93d3cuaWNsby5jby5pZFwvYWJvdXQiLCJyb3V0ZSI6ImFib3V0In0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=', 1790904661),
('mdBrKsW3lvELXtJaZo8GbYwYgELHW2FKShlsqc3H', NULL, '66.249.72.174', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.84 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 'eyJfdG9rZW4iOiJLekVkUldlaFNHcmhtTWhFU3l6amtMeDlObEtyb1VVc0RvZTE2d1k0IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC93d3cuaWNsby5jby5pZCIsInJvdXRlIjoiaG9tZSJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19', 1790795307),
('nBdQDoZW8Vx5y1LE2oauBQMraxe6xKl1IuyQOkbz', NULL, '2a03:2880:f80e:71::', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36 (compatible; meta-externalagent/1.1 (+https://developers.facebook.com/docs/sharing/webmasters/crawler))', 'eyJfdG9rZW4iOiJBODh6bXhac1Q4aUdneU1sZmVoVE00N2QyRjR0ek8yUnE4ZzRtd3JzIiwibG9jYWxlIjoiZW4iLCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cHM6XC9cL3d3dy5pY2xvLmNvLmlkXC9sb2NhbGVcL2VuIiwicm91dGUiOiJsb2NhbGUuc3dpdGNoIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=', 1790819379),
('nqWHkT6gKfGOkxR1K9UulLWli7AqWcT3y0xXuHTP', NULL, '157.55.39.54', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'eyJfdG9rZW4iOiJKUjRBM0dXSVk2QWFTS2ZrMnBxdFRHZzVWOGdoZFNNeTBCaU50cm1lIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC93d3cuaWNsby5jby5pZFwvc2VydmljZXMiLCJyb3V0ZSI6InNlcnZpY2VzIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=', 1790841867),
('oOEgmJpqnqG53yl1yk4EZdEhTtPwV8501CSkvcJz', NULL, '2001:4860:7:506::e', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJrMFdwOWd6SjFVMzJwSHl1blZwUmJoTG9BNUlPbTJNelZiNU04UVdJIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9pY2xvLmNvLmlkIiwicm91dGUiOiJob21lIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=', 1790822613),
('psbttW98qu45hbtOPK8ifPwC8DyGk6O7WZS77PSG', NULL, '182.253.14.170', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiI1ZENOR3pIeFJMR1plWGt1YWRlRzlpUGd4NTBGNFdBWHdyNUtzZ1pKIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9pY2xvLmNvLmlkIiwicm91dGUiOiJob21lIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=', 1790848736),
('pzpDj0ML037wwALx2Lyjo4lnT7y9GUt5Lik1AGra', NULL, '2001:4860:7:806::cf', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJSZmNTSnJXR3RjZmwydVk0RjdYV0ZSVjIxME5LV0wyZjRBa3hBa1NOIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9pY2xvLmNvLmlkIiwicm91dGUiOiJob21lIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=', 1790856407),
('Q4R3fL38OrLHEE11E5JID5o3QYtW6JoGqu7WCqEb', NULL, '172.197.160.204', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko); compatible; ChatGPT-User/1.0; +https://openai.com/bot', 'eyJfdG9rZW4iOiJCbkVBRWFFaE50QTY3ak1MM0ExTlVlb1hVeU0yWjdIT3hTRlJuQnFXIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9pY2xvLmNvLmlkXC9zZXJ2aWNlcyIsInJvdXRlIjoic2VydmljZXMifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1790848913),
('q9JNprZUQuabfZe023zQayyXQEONxNTPwv7ui12I', NULL, '66.249.69.15', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.8010.52 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 'eyJfdG9rZW4iOiJKSEl1OWloRkNuZzRmWnhkdWpZVURYZ1BuU1N1T0VSODhnb1NGdXI3IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC93d3cuaWNsby5jby5pZFwvZXhwZXJ0c1wvc3lhcmlmLWhpZGF5YXQiLCJyb3V0ZSI6ImV4cGVydHMuc2hvdyJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19', 1790878636),
('QMyGTxVtlvqUntaIoPINJoiiXJq1GssjWbLAf6ev', NULL, '2001:4860:7:b06::f9', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJPR2hCV2xTRjdabnI3VjN5eG5hOFNzWDdwY21MYXp1aHhkVkt5OVlUIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC93d3cuaWNsby5jby5pZFwvYWJvdXQiLCJyb3V0ZSI6ImFib3V0In0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=', 1790856407),
('RNf8GM3SvK9QUL80Nj4wKdPB39mEO5ZHWBWPajIG', NULL, '66.249.72.173', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.8010.52 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 'eyJfdG9rZW4iOiJQUktKMUVlMjJZdDE3dEc5ano1UXFoUk5PN2pXYXN3VzNJQmZ0YXpoIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC93d3cuaWNsby5jby5pZFwvYXJ0aWNsZXNcL3dvcmtmb3JjZS1kaXZlcnNpdHktZXF1aXR5LWluY2x1c2lvbi1kZWktZGlhZ25vc3RpY3MiLCJyb3V0ZSI6ImFydGljbGVzLnNob3cifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1790823922),
('SKuywOxmd1LezrM89BtOr1Pfqe3tV3QUvPzbi5AW', NULL, '52.167.144.204', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'eyJfdG9rZW4iOiJsRXZVT3RpVVlhT0p4MHN4WUpnOEdURVIxMU5KamJwTU5FekEzN3RTIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC93d3cuaWNsby5jby5pZFwvZXhwZXJ0c1wvdW5hbmctbXVsa2hhbiIsInJvdXRlIjoiZXhwZXJ0cy5zaG93In0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=', 1790852446),
('SnfzE49BeCkMIHJXaylObmTbwVGePj5cffTeyqzO', NULL, '2001:4860:7:506::db', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJ4Z3A5UTJxZFRXMkZJZ1U2SzIyNXFhTnNOT2RBSERtb3dsY1dxWG05IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC93d3cuaWNsby5jby5pZFwvYWJvdXQiLCJyb3V0ZSI6ImFib3V0In0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=', 1790848269),
('SznhinWzJu4PaSXaZHnEScIpmj5fQJSCin7W87tI', NULL, '182.3.46.138', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJ4czdMVUdrTnR5ZkhOTWtHc3JXTFBldFNrZkEyTmVtbElnaTk2UjhSIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9pY2xvLmNvLmlkIiwicm91dGUiOiJob21lIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=', 1790910005),
('T9ERaoj7X4ByXp2H8XS0lTkwMWtjYoqM7zgVdaMR', NULL, '172.197.160.196', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko); compatible; ChatGPT-User/1.0; +https://openai.com/bot', 'eyJfdG9rZW4iOiJ5SEJ3UVJXQ0dwNlJESVZUbVZETXdBdnkwdGRsaU95MnQxZ3ZiUU9VIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9pY2xvLmNvLmlkIiwicm91dGUiOiJob21lIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=', 1790855995),
('tulMXGrMYPYHiQFJMtJxjRH97DntzCEdHH1Iu1Y6', NULL, '102.219.170.113', '', 'eyJfdG9rZW4iOiJ4NHg5a2VvNjVLVGxtRElNaFlualNCQktscDhQbmo1V2xOWmhjT1FNIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9pY2xvLmNvLmlkIiwicm91dGUiOiJob21lIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=', 1790792587),
('tZs5DGtQYS8YY4owNbMJRPNMCv44yJTXj7FQ8A8L', NULL, '2a03:2880:18ff:54::', 'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)', 'eyJfdG9rZW4iOiI0SVNFQTY0eWFmY0hJYnFMUlY5bVJKQjhzZDg0bG1mUnhYeHc2Tmg1IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9pY2xvLmNvLmlkIiwicm91dGUiOiJob21lIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=', 1790904142),
('u7yPutLZNYYdzAIKuJK2OmvBL8Ay1ZMWWjR7kymD', NULL, '204.217.131.177', 'Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.9.2) Gecko/20100128 Gentoo Firefox/3.6', 'eyJfdG9rZW4iOiJTRjhBa01pWndXRmxKclNoUklkU01zOHE2WVJNMkxTSm1lYXNnZUlDIiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1790914133),
('UDIaaedPUX9rgGn2jFJNTIncQY4T3Zkw8cOj5aM4', NULL, '172.197.160.193', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko); compatible; ChatGPT-User/1.0; +https://openai.com/bot', 'eyJfdG9rZW4iOiJwbzJhbkNEUmFZVHg3M0Q1N3J4YkQ5T2xlWXdyYlVpYWNtTEdITFA0IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9pY2xvLmNvLmlkXC9hYm91dCIsInJvdXRlIjoiYWJvdXQifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1790848913),
('UpljF9xbd9b2URdFhYK9u2e98g6VL5sSylSNsaVA', NULL, '207.46.13.150', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm) Chrome/116.0.1938.76 Safari/537.36', 'eyJfdG9rZW4iOiJ6QXEwaThrUzN3VFphdERHTW5JNE9YSTAyeUZJYWNYSm01TTlwTnFxIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC93d3cuaWNsby5jby5pZFwvc2VydmljZXMiLCJyb3V0ZSI6InNlcnZpY2VzIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=', 1790857865),
('UVdwksWy0SqYcknxZDDkd2wTQBYiU9KTawFw9aRk', NULL, '172.197.160.194', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko); compatible; ChatGPT-User/1.0; +https://openai.com/bot', 'eyJfdG9rZW4iOiJwYmdrb0d0UnVxYUVaeFNHM3FGRkIzZ2N2dXRiTUZNNWh6ajJQSUNEIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9pY2xvLmNvLmlkXC9leHBlcnRzXC90YXV2aWstbXVoYW1tYWQiLCJyb3V0ZSI6ImV4cGVydHMuc2hvdyJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19', 1790856464),
('vuVL53RF2CIMF1zOAh6UAtoX5lSdyn6SukrVSoVs', NULL, '182.253.228.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJTZ1RENTlrZlhSNVRnNDFzWTdxWnJwUkRyT1R2TW1BTEx4ZjFqQTNWIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9pY2xvLmNvLmlkXC9pbmRleC5waHA/X2ZpZWxkcz1pZCUyQ3NsdWclMkN0ZW1wbGF0ZSZwZXJfcGFnZT0xMDAmcmVzdF9yb3V0ZT0lMkZ3cCUyRnYyJTJGcGFnZXMiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1790798901),
('WEmWn6pSk5kI3x4FubtDcBA5WjKUTGekKHTmAiW9', NULL, '203.77.248.139', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiI5NUNzQmF6bFVLREFJZGZMdEIyTzZCbWo3cUtmZUFOOEhaMk1QTFd2IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9pY2xvLmNvLmlkIiwicm91dGUiOiJob21lIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfSwibG9jYWxlIjoiZW4ifQ==', 1790822637),
('xgZ14k4vDhdfPYaTMy9gCeCPHSFYCy6AsDc9s4nt', NULL, '66.249.77.164', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.8010.52 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 'eyJfdG9rZW4iOiJsUzlPM2V6VVY3NEx3QXVLbkNneUFDTTJiNWVNYURFbzRKeU1rWUpIIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9pY2xvLmNvLmlkXC9hcnRpY2xlcyIsInJvdXRlIjoiYXJ0aWNsZXMuaW5kZXgifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1790835254),
('xtjtJJAANWhQ8uoQ7pXSj65mpG4xsoBdK9ak7Om5', NULL, '114.10.30.227', 'Mozilla/5.0 (Linux; Android 15; CPH2637 Build/AP3A.240617.008) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/153.0.8010.44 Mobile Safari/537.36 [FB_IAB/FB4A;FBAV/579.0.0.52.74;IABMV/1;]', 'eyJfdG9rZW4iOiJoWUE0OWRTamdtVmN0UTRpVE55VTlpWEgwNVp6aUh5eFRhSzZGN3R5IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC93d3cuaWNsby5jby5pZFwvP2ZiY2xpZD1Jd1kyeGphd1VyNW1abGVIUnVBMkZsYlFJeE1RQndaRzltQlhOeWRHTUdZWEJ3WDJsa0RETTFNRFk0TlRVek1UY3lPQUFCSGhRVWw5TmYxejhVTllQdXFmSEtIbnBLdzlFM1YwUXpXUHBqZmh3cEJEbXdqRWx6ZjM5YUl5SHpXazBZX2FlbV9xa1lJX1ZHRFJ5dElxV2UtTUExSkdBIiwicm91dGUiOiJob21lIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=', 1790904088),
('Zt3rApmgHDBkrHKMq7kRY6NAiJj9PogHp8Zbwqju', NULL, '91.235.84.231', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJ2NUdCSGtSZE9rRzhoaUFxMllUdVhBYVdDV2JlMDRYWmRpWDhwNUppIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9pY2xvLmNvLmlkIiwicm91dGUiOiJob21lIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=', 1790816505),
('ZtqGL73rDuQiKbNzceAlPz198L4RhQafGhhTm3Nm', NULL, '66.249.77.165', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.8010.52 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 'eyJfdG9rZW4iOiJPRm5hMVA2V0Q0SU5qbVNyTGlOZnhiUHI3dFJDZUhoMUk4ZUh6Zm81IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHBzOlwvXC9pY2xvLmNvLmlkXC9leHBlcnRzXC90YXV2aWstbXVoYW1tYWQiLCJyb3V0ZSI6ImV4cGVydHMuc2hvdyJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19', 1790793168);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator ICLO', 'admin@iclo.co.id', NULL, '$2y$12$Iz33ljYJjvrWyRSp.nYul.rlQrCVW4jxNAghfs1lcs28ZoEhui09y', NULL, '2026-07-19 17:25:15', '2026-07-19 17:26:33');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `articles_slug_unique` (`slug`),
  ADD KEY `articles_author_id_foreign` (`author_id`),
  ADD KEY `articles_category_id_foreign` (`category_id`);

--
-- Indeks untuk tabel `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `authors_email_unique` (`email`);

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indeks untuk tabel `contact_submissions`
--
ALTER TABLE `contact_submissions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`),
  ADD KEY `failed_jobs_connection_queue_failed_at_index` (`connection`,`queue`,`failed_at`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`id`),
  ADD KEY `resources_author_id_foreign` (`author_id`),
  ADD KEY `resources_resource_category_id_foreign` (`resource_category_id`);

--
-- Indeks untuk tabel `resource_categories`
--
ALTER TABLE `resource_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `resource_categories_slug_unique` (`slug`);

--
-- Indeks untuk tabel `sectors`
--
ALTER TABLE `sectors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sectors_slug_unique` (`slug`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `authors`
--
ALTER TABLE `authors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `contact_submissions`
--
ALTER TABLE `contact_submissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `resources`
--
ALTER TABLE `resources`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `resource_categories`
--
ALTER TABLE `resource_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `sectors`
--
ALTER TABLE `sectors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `articles_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `resources`
--
ALTER TABLE `resources`
  ADD CONSTRAINT `resources_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `resources_resource_category_id_foreign` FOREIGN KEY (`resource_category_id`) REFERENCES `resource_categories` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
