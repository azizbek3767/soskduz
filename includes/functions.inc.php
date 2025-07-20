<?php
/**
 * @param $message
 */
function logThis($message)
{
    $fileName = basename($_SERVER['PHP_SELF']) . '.log';
    $fh = fopen($fileName, 'a');
    fwrite($fh, date('[Y-m-d H:i:s] ') . $message . "\r\n");
    fclose($fh);
}

/**
 * @param bool $withQueryString
 * @return string
 */
function getSelfUrl($withQueryString = false)
{
    $fullUrl = 'http';
    if (isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) == 'on') $fullUrl .= 's';
    $fullUrl .= '://';
    $fullUrl .= $_SERVER['HTTP_HOST'];
    if (isset($_SERVER['HTTPS']) && $_SERVER['SERVER_PORT'] != '80') $fullUrl .= ':' . $_SERVER['SERVER_PORT'];
    $fullUrl .= $_SERVER['PHP_SELF'];
    if (($withQueryString == true) && !empty($_SERVER['QUERY_STRING'])) $fullUrl .= '?' . $_SERVER['QUERY_STRING'];
    return $fullUrl;
}

/**
 * @param $regex
 * @param $string
 * @return bool
 */
function pregGetValue($regex, $string)
{
    if (preg_match($regex, $string, $matches)) return $matches[1];
    return false;
}

/**
 * @param $document
 * @return string
 */
function stripHtml($document)
{
    $search = array("'<script[^>]*?>.*?</script>'si", "'<[\/\!]*?[^<>]*?>'si", "'([\r\n])[\s]+'", "'&(quot|#34);'i", "'&(amp|#38);'i", "'&(lt|#60);'i", "'&(gt|#62);'i", "'&(nbsp|#160);'i", "'&(iexcl|#161);'i", "'&(cent|#162);'i", "'&(pound|#163);'i", "'&(copy|#169);'i");
    $replace = array("", " ", "\\1", "\"", "&", "<", ">", " ", chr(161), chr(162), chr(163), chr(169));
    return trim(preg_replace($search, $replace, $document));
}

/**
 * @param $string
 * @return string
 */
function unhtmlentities($string)
{
    // заменить цифрами лиц
    $string = preg_replace('~&#x([0-9a-f]+);~ei', 'chr(hexdec("\\1"))', $string);
    $string = preg_replace('~&#([0-9]+);~e', 'chr("\\1")', $string);

    // заменить буквальное лиц
    $trans_tbl = get_html_translation_table(HTML_ENTITIES);
    $trans_tbl = array_flip($trans_tbl);
    return strtr($string, $trans_tbl);
}

/**
 * @param $string
 * @param int $length
 * @param string $etc
 * @param bool $break_words
 * @param bool $middlecut
 * @return null|string|string[]
 */
function stringTruncate($string, $length = 80, $etc = '...', $break_words = false, $middlecut = false)
{
    if ($length == 0) return '';

    if (strlen($string) > $length) {
        if ($middlecut) {
            $length -= strlen($etc);
            return substr($string, 0, ceil($length / 2)) . $etc . substr($string, -intval($length / 2));
        } else {
            $length -= strlen($etc);
            if (!$break_words) $string = preg_replace('/\s+?(\S+)?$/', '', substr($string, 0, $length + 1));
            return substr($string, 0, $length) . $etc;
        }
    } else {
        return $string;
    }
}

//    section functions start
/**
 * @param $query
 * @param $match
 * @param $where
 * @param $fields
 * @param $orderBy
 * @return bool
 */
function fetch_sections_addQueryConditions($query, $match, &$where, &$fields, &$orderBy)
{
    global $mysqli;
    if (empty($query)) return false;
    switch ($match) {
        case 'like':
            if (preg_match_all('/\w+/', $query, $matches)) {
                foreach ($matches[0] as $word) {
                    $where[] = "(name LIKE '%" . mysqli_real_escape_string($mysqli, $word) . "%' OR content LIKE '%" . mysqli_real_escape_string($mysqli, $word) . "%' OR summary LIKE '%" . mysqli_real_escape_string($mysqli, $word) . "%')";
                }
            }
            break;
        case 'all':
            $filter = preg_replace('/\s+/', ' +', '+' . trim($query));
            $where[] = "MATCH(name, content, summary) AGAINST ('" . mysqli_real_escape_string($mysqli, $filter) . "' IN BOOLEAN MODE)";
            $fields .= ", MATCH(name, content, summary) AGAINST ('" . mysqli_real_escape_string($mysqli, $query) . "') AS relevance";
            if (empty($orderBy)) $orderBy = 'relevance DESC';
            break;
        case 'exact':
            $where[] = "MATCH(name, content, summary) AGAINST ('\"" . mysqli_real_escape_string($mysqli, $query) . "\"' IN BOOLEAN MODE)";
            $fields .= ", MATCH(name, content, summary) AGAINST ('" . mysqli_real_escape_string($mysqli, $query) . "')";
            if (empty($orderBy)) $orderBy = '';
            break;
        case 'advanced':
            $relevance = trim(preg_replace('/[\+\-\"\~\(\)\* ]+/', ' ', trim($query)));
            $where[] = "MATCH(name, content, summary) AGAINST ('" . mysqli_real_escape_string($mysqli, $query) . "' IN BOOLEAN MODE)";
            $fields .= ", MATCH(name, content, summary) AGAINST ('" . mysqli_real_escape_string($mysqli, $relevance) . "') AS relevance";
            if (empty($orderBy)) $orderBy = 'relevance DESC';
            break;
        case 'any':
        default:
            $query = substr($query, 0, 64);
            $query = preg_replace("/[^\w\x7F-\xFF\s]/", " ", $query);
            $where[] = "(name LIKE '%" . mysqli_real_escape_string($mysqli, $query) . "%' OR content LIKE '%" . mysqli_real_escape_string($mysqli, $query) . "%' OR summary LIKE '%" . mysqli_real_escape_string($mysqli, $query) . "%' OR keywords LIKE '%" . mysqli_real_escape_string($mysqli, $query) . "%')";
            break;
    }
}

function fetch_sections_addQueryConditionsAjax($query, $match, &$where, &$fields, &$orderBy)
{
    global $mysqli;
    if (empty($query)) return false;
    switch ($match) {
        case 'like':
            if (preg_match_all('/\w+/', $query, $matches)) {
                foreach ($matches[0] as $word) {
                    $where[] = "(name LIKE '%" . mysqli_real_escape_string($mysqli, $word) . "%' OR content LIKE '%" . mysqli_real_escape_string($mysqli, $word) . "%' OR summary LIKE '%" . mysqli_real_escape_string($mysqli, $word) . "%')";
                }
            }
            break;
        case 'all':
            $filter = preg_replace('/\s+/', ' +', '+' . trim($query));
            $where[] = "MATCH(name, content, summary) AGAINST ('" . mysqli_real_escape_string($mysqli, $filter) . "' IN BOOLEAN MODE)";
            $fields .= ", MATCH(name, content, summary) AGAINST ('" . mysqli_real_escape_string($mysqli, $query) . "') AS relevance";
            if (empty($orderBy)) $orderBy = 'relevance DESC';
            break;
        case 'exact':
            $where[] = "MATCH(name, content, summary) AGAINST ('\"" . mysqli_real_escape_string($mysqli, $query) . "\"' IN BOOLEAN MODE)";
            $fields .= ", MATCH(name, content, summary) AGAINST ('" . mysqli_real_escape_string($mysqli, $query) . "')";
            if (empty($orderBy)) $orderBy = '';
            break;
        case 'advanced':
            $relevance = trim(preg_replace('/[\+\-\"\~\(\)\* ]+/', ' ', trim($query)));
            $where[] = "MATCH(name, content, summary) AGAINST ('" . mysqli_real_escape_string($mysqli, $query) . "' IN BOOLEAN MODE)";
            $fields .= ", MATCH(name, content, summary) AGAINST ('" . mysqli_real_escape_string($mysqli, $relevance) . "') AS relevance";
            if (empty($orderBy)) $orderBy = 'relevance DESC';
            break;
        case 'any':
        default:
            $query = substr($query, 0, 64);
            $query = preg_replace("/[^\w\x7F-\xFF\s]/", " ", $query);
            $where[] = "(name LIKE '%" . mysqli_real_escape_string($mysqli, $query) . "%')";
            break;
    }
}

function fetch_articles_addQueryConditionsAjax($query, $match, &$where, &$fields, &$orderBy)
{
    global $mysqli;
    if (empty($query)) return false;
    switch ($match) {
        case 'like':
            if (preg_match_all('/\w+/', $query, $matches)) {
                foreach ($matches[0] as $word) {
                    $where[] = "(title LIKE '%" . mysqli_real_escape_string($mysqli, $word) . "%' OR content LIKE '%" . mysqli_real_escape_string($mysqli, $word) . "%' OR summary LIKE '%" . mysqli_real_escape_string($mysqli, $word) . "%')";
                }
            }
            break;
        case 'all':
            $filter = preg_replace('/\s+/', ' +', '+' . trim($query));
            $where[] = "MATCH(title, content, summary) AGAINST ('" . mysqli_real_escape_string($mysqli, $filter) . "' IN BOOLEAN MODE)";
            $fields .= ", MATCH(title, content, summary) AGAINST ('" . mysqli_real_escape_string($mysqli, $query) . "') AS relevance";
            if (empty($orderBy)) $orderBy = 'relevance DESC';
            break;
        case 'exact':
            $where[] = "MATCH(title, content, summary) AGAINST ('\"" . mysqli_real_escape_string($mysqli, $query) . "\"' IN BOOLEAN MODE)";
            $fields .= ", MATCH(title, content, summary) AGAINST ('" . mysqli_real_escape_string($mysqli, $query) . "')";
            if (empty($orderBy)) $orderBy = '';
            break;
        case 'advanced':
            $relevance = trim(preg_replace('/[\+\-\"\~\(\)\* ]+/', ' ', trim($query)));
            $where[] = "MATCH(title, content, summary) AGAINST ('" . mysqli_real_escape_string($mysqli, $query) . "' IN BOOLEAN MODE)";
            $fields .= ", MATCH(title, content, summary) AGAINST ('" . mysqli_real_escape_string($mysqli, $relevance) . "') AS relevance";
            if (empty($orderBy)) $orderBy = 'relevance DESC';
            break;
        case 'any':
        default:
            $query = substr($query, 0, 64);
            $query = preg_replace("/[^\w\x7F-\xFF\s]/", " ", $query);
            $where[] = "(title LIKE '%" . mysqli_real_escape_string($mysqli, $query) . "%')";
            break;
    }
}

/**
 * @param $orderBy
 * @return bool
 */
function fetch_sections_calculatePopularity($orderBy)
{
    global $config, $gmNow;

    if (strpos($orderBy, 'popularity') === false) return false;

    if (!$config['statistics_enabled']) return false;

    if (strpos($orderBy, 'popularityLast14days') !== false) {
        /* last 14 days */
        $dateEnd = gmdate('Y-m-d', strtotime("$config[hour_adjustment] hours $config[minute_adjustment] minutes"));
        $dateStart = gmdate('Y-m-d', strtotime("-2 week $config[hour_adjustment] hours $config[minute_adjustment] minutes"));
        $period = 'popularityLast14days';
    } elseif (strpos($orderBy, 'popularityLast30days') !== false) {
        /* last 30 days */
        $dateEnd = gmdate('Y-m-d', strtotime("$config[hour_adjustment] hours $config[minute_adjustment] minutes"));
        $dateStart = gmdate('Y-m-d', strtotime("-30 days $config[hour_adjustment] hours $config[minute_adjustment] minutes"));
        $period = 'popularityLast30days';
    } elseif (strpos($orderBy, 'popularityLastMonth') !== false) {
        /* last month */
        $dateEnd = gmdate('Y-m-d', mktime($config['hour_adjustment'], $config['minute_adjustment'], 0, date('n'), 0));
        $dateStart = gmdate('Y-m-01', strtotime("-1 month $config[hour_adjustment] hours $config[minute_adjustment] minutes"));
        $period = 'popularityLastMonth';
    } elseif (strpos($orderBy, 'popularityYesterday') !== false) {
        /* yesterday */
        $dateEnd = $dateStart = gmdate('Y-m-d', strtotime("-1 day $config[hour_adjustment] hours $config[minute_adjustment] minutes"));
        $period = 'popularityYesterday';
    } else {
        /* last 7 days */
        $dateEnd = gmdate('Y-m-d', strtotime("$config[hour_adjustment] hours $config[minute_adjustment] minutes"));
        $dateStart = gmdate('Y-m-d', strtotime("-1 week $config[hour_adjustment] hours $config[minute_adjustment] minutes"));
        $period = 'popularityLast7days';
    }

    /* если последнее обновление было сегодня , то не обновлять */
    if (!empty($config['last_article_' . $period . '_update']) && $config['last_article_' . $period . '_update'] == adjustTime($gmNow, false, 'Y-m-d')) return false;

    $dateStart = adjustTime($dateStart . ' 00:00:00', true);
    $dateEnd = adjustTime($dateEnd . ' 23:59:59', true);

    $where[] = "visitDate >= '$dateStart'";
    $where[] = "visitDate <= '$dateEnd'";
    $where[] = "typeId = 3";
    $articles = dbQuery('stats_visits', DB_ARRAYS, array('fields' => "articleId, COUNT(*) AS $period", 'where' => $where, 'join' => array('stats_article_visits' => 'USING(visitId)'), 'group' => 'articleId', 'indexKey' => 'articleId', 'valueKey' => $period));

    /* сбросить все предыдущие счетчики популярности */
    dbQuery('articles', DB_UPDATE, array('values' => "$period = 0"));
    foreach ($articles as $articleId => $popularity) dbQuery('articles', DB_UPDATE_LOW_PRIORITY, array('where' => "articleId = $articleId", 'values' => "$period = $popularity"));

    /* сохранение даты обновления */
    $setting['codename'] = 'last_article_' . $period . '_update';
    $setting['value'] = adjustTime($gmNow, false, 'Y-m-d');
    $config[$setting['codename']] = $setting['value'];
    dbQuery('settings', DB_REPLACE, array('values' => $setting));

    return true;
}

/**
 * @param $skip
 * @param $where
 * @return bool
 */
function fetch_sections_addSkipConditions($skip, &$where)
{
    global $SECTIONS, $fetchedArticles;

    if (is_null($skip)) return false;
    if (!is_array($skip = explode(',', str_replace(' ', '', $skip)))) return false;

    $skippedSections = array();
    $skippedArticles = array();
    foreach ($skip as $skipItem) {
        /* пропустить articleID */
        if (is_numeric($skipItem) && empty($fetchedArticles[$skipItem])) {
            $skippedArticles[] = $skipItem;

            /* пропустить статью набор */
        } elseif (!empty($fetchedArticles[$skipItem])) {
            $skippedArticles += $fetchedArticles[$skipItem];

            /* Специальный параметр " allPrevious " - пропустить все уже полученные статьи */
        } elseif ($skipItem == 'allPrevious' && !empty($fetchedArticles)) {
            foreach ($fetchedArticles as $articleSet) $skippedArticles = array_merge($skippedArticles, $articleSet);

            /* специальный параметр " hiddenSections " - пропустить все статьи в скрытых разделах */
        } elseif ($skipItem == 'hiddenSections') {
            foreach ($SECTIONS as $sectionItem) {
                if ($sectionItem['status'] == 'hidden') {
                    $skippedSections[] = $sectionItem['sectionId'];
                    if (!empty($SECTIONS[$skipSectionId]['allChildren'])) $skippedSections += $SECTIONS[$skipSectionId]['allChildren'];
                }
            }

            /* пропустить раздел, sectionID , имени или имя fileName (section-X) */
        } elseif (strpos($skipItem, 'section-') !== false) {
            $skipSectionId = str_replace('section-', '', $skipItem);
            if (!is_numeric($skipSectionId)) {
                foreach ($SECTIONS as $sectionItem) if ($sectionItem['fileName'] == $skipSectionId) {
                    $skipSectionId = $sectionItem['sectionId'];
                    break;
                }
            }
            $skippedSections[] = $skipSectionId;
            if (!empty($SECTIONS[$skipSectionId]['allChildren'])) $skippedSections += $SECTIONS[$skipSectionId]['allChildren'];

        }
    }
    if (!empty($skippedArticles)) $where[] = "articleId NOT IN (" . implode(',', array_unique($skippedArticles)) . ")";
    if (!empty($skippedSections)) $where[] = "sectionId NOT IN (" . implode(',', array_unique($skippedSections)) . ")";
    return true;
}

/**
 * @param $fields
 * @return array|mixed|null|string
 */
function fetch_sections_filterFields(&$fields)
{
    /* освобождая от возможных ошибок */
    $fields = str_replace(' ', '', $fields);
    $fields = explode(',', $fields);
    $fields = array_flip($fields);

    /* Поля, которые должны представить */
    if (empty($fields['sectionId'])) $fields['sectionId'] = 1;
    $fields = implode(',', array_keys($fields));
    return $fields;
}

//    section functions end

/**
 * @param $query
 * @param $match
 * @param $where
 * @param $fields
 * @param $orderBy
 * @return bool
 */
function fetch_articles_addQueryConditions($query, $match, &$where, &$fields, &$orderBy)
{
    global $mysqli;
    if (empty($query)) return false;
    switch ($match) {
        case 'like':
            if (preg_match_all('/\w+/', $query, $matches)) {
                foreach ($matches[0] as $word) {
                    $where[] = "(title LIKE '%" . mysqli_real_escape_string($mysqli, $word) . "%' OR content LIKE '%" . mysqli_real_escape_string($mysqli, $word) . "%' OR summary LIKE '%" . mysqli_real_escape_string($mysqli, $word) . "%')";
                }
            }
            break;
        case 'all':
            $filter = preg_replace('/\s+/', ' +', '+' . trim($query));
            $where[] = "MATCH(title, content, summary) AGAINST ('" . mysqli_real_escape_string($mysqli, $filter) . "' IN BOOLEAN MODE)";
            $fields .= ", MATCH(title, content, summary) AGAINST ('" . mysqli_real_escape_string($mysqli, $query) . "') AS relevance";
            if (empty($orderBy)) $orderBy = 'relevance DESC';
            break;
        case 'exact':
            $where[] = "MATCH(title, content, summary) AGAINST ('\"" . mysqli_real_escape_string($mysqli, $query) . "\"' IN BOOLEAN MODE)";
            $fields .= ", MATCH(title, content, summary) AGAINST ('" . mysqli_real_escape_string($mysqli, $query) . "')";
            if (empty($orderBy)) $orderBy = '';
            break;
        case 'advanced':
            $relevance = trim(preg_replace('/[\+\-\"\~\(\)\* ]+/', ' ', trim($query)));
            $where[] = "MATCH(title, content, summary) AGAINST ('" . mysqli_real_escape_string($mysqli, $query) . "' IN BOOLEAN MODE)";
            $fields .= ", MATCH(title, content, summary) AGAINST ('" . mysqli_real_escape_string($mysqli, $relevance) . "') AS relevance";
            if (empty($orderBy)) $orderBy = 'relevance DESC';
            break;
        case 'any':
        default:
            $query = substr($query, 0, 64);
            $query = preg_replace("/[^\w\x7F-\xFF\s]/", " ", $query);
            $where[] = "(title LIKE '%" . mysqli_real_escape_string($mysqli, $query) . "%' OR content LIKE '%" . mysqli_real_escape_string($mysqli, $query) . "%' OR summary LIKE '%" . mysqli_real_escape_string($mysqli, $query) . "%' OR keywords LIKE '%" . mysqli_real_escape_string($mysqli, $query) . "%')";
            break;
    }
}

/**
 * @param $orderBy
 * @return bool
 */
function fetch_articles_calculatePopularity($orderBy)
{
    global $config, $gmNow;

    if (strpos($orderBy, 'popularity') === false) return false;

    if (!$config['statistics_enabled']) return false;

    if (strpos($orderBy, 'popularityLast14days') !== false) {
        /* last 14 days */
        $dateEnd = gmdate('Y-m-d', strtotime("$config[hour_adjustment] hours $config[minute_adjustment] minutes"));
        $dateStart = gmdate('Y-m-d', strtotime("-2 week $config[hour_adjustment] hours $config[minute_adjustment] minutes"));
        $period = 'popularityLast14days';
    } elseif (strpos($orderBy, 'popularityLast30days') !== false) {
        /* last 30 days */
        $dateEnd = gmdate('Y-m-d', strtotime("$config[hour_adjustment] hours $config[minute_adjustment] minutes"));
        $dateStart = gmdate('Y-m-d', strtotime("-30 days $config[hour_adjustment] hours $config[minute_adjustment] minutes"));
        $period = 'popularityLast30days';
    } elseif (strpos($orderBy, 'popularityLastMonth') !== false) {
        /* last month */
        $dateEnd = gmdate('Y-m-d', mktime($config['hour_adjustment'], $config['minute_adjustment'], 0, date('n'), 0));
        $dateStart = gmdate('Y-m-01', strtotime("-1 month $config[hour_adjustment] hours $config[minute_adjustment] minutes"));
        $period = 'popularityLastMonth';
    } elseif (strpos($orderBy, 'popularityYesterday') !== false) {
        /* yesterday */
        $dateEnd = $dateStart = gmdate('Y-m-d', strtotime("-1 day $config[hour_adjustment] hours $config[minute_adjustment] minutes"));
        $period = 'popularityYesterday';
    } else {
        /* last 7 days */
        $dateEnd = gmdate('Y-m-d', strtotime("$config[hour_adjustment] hours $config[minute_adjustment] minutes"));
        $dateStart = gmdate('Y-m-d', strtotime("-1 week $config[hour_adjustment] hours $config[minute_adjustment] minutes"));
        $period = 'popularityLast7days';
    }

    /* если последнее обновление было сегодня , то не обновлять */
    if (!empty($config['last_article_' . $period . '_update']) && $config['last_article_' . $period . '_update'] == adjustTime($gmNow, false, 'Y-m-d')) return false;

    $dateStart = adjustTime($dateStart . ' 00:00:00', true);
    $dateEnd = adjustTime($dateEnd . ' 23:59:59', true);

    $where[] = "visitDate >= '$dateStart'";
    $where[] = "visitDate <= '$dateEnd'";
    $where[] = "typeId = 3";
    $articles = dbQuery('stats_visits', DB_ARRAYS, array('fields' => "articleId, COUNT(*) AS $period", 'where' => $where, 'join' => array('stats_article_visits' => 'USING(visitId)'), 'group' => 'articleId', 'indexKey' => 'articleId', 'valueKey' => $period));

    /* сбросить все предыдущие счетчики популярности */
    dbQuery('articles', DB_UPDATE, array('values' => "$period = 0"));
    foreach ($articles as $articleId => $popularity) dbQuery('articles', DB_UPDATE_LOW_PRIORITY, array('where' => "articleId = $articleId", 'values' => "$period = $popularity"));

    /* сохранение даты обновления */
    $setting['codename'] = 'last_article_' . $period . '_update';
    $setting['value'] = adjustTime($gmNow, false, 'Y-m-d');
    $config[$setting['codename']] = $setting['value'];
    dbQuery('settings', DB_REPLACE, array('values' => $setting));

    return true;
}

/**
 * @param $section
 * @param $noSubsections
 * @param $where
 * @return bool
 */
function fetch_articles_addSectionConditions($section, $noSubsections, &$where)
{
    global $SECTIONS;

    if (!$section) return false;

    $sectionIds = array();
    $sections = explode(',', $section);

    foreach ($sections as $section) {
        $section = trim($section);
        if (!is_numeric($section)) {
            foreach ($SECTIONS as $sectionItem) if ($sectionItem['fileName'] == $section) {
                $section = $sectionItem['sectionId'];
                break;
            }
        }
        if (!empty($SECTIONS[$section])) {
            $sectionIds[] = $section;
            if ($noSubsections == false && !empty($SECTIONS[$section]['allChildren'])) $sectionIds = array_merge($sectionIds, $SECTIONS[$section]['allChildren']);
        }
    }
    if (!empty($sectionIds)) $where[] = "sectionId IN (" . implode(',', $sectionIds) . ")";
    return true;
}

/**
 * @param $skip
 * @param $where
 * @return bool
 */
function fetch_articles_addSkipConditions($skip, &$where)
{
    global $SECTIONS, $fetchedArticles;

    if (is_null($skip)) return false;
    if (!is_array($skip = explode(',', str_replace(' ', '', $skip)))) return false;

    $skippedSections = array();
    $skippedArticles = array();
    foreach ($skip as $skipItem) {
        /* пропустить articleID */
        if (is_numeric($skipItem) && empty($fetchedArticles[$skipItem])) {
            $skippedArticles[] = $skipItem;

            /* пропустить статью набор */
        } elseif (!empty($fetchedArticles[$skipItem])) {
            $skippedArticles += $fetchedArticles[$skipItem];

            /* Специальный параметр " allPrevious " - пропустить все уже полученные статьи */
        } elseif ($skipItem == 'allPrevious' && !empty($fetchedArticles)) {
            foreach ($fetchedArticles as $articleSet) $skippedArticles = array_merge($skippedArticles, $articleSet);

            /* специальный параметр " hiddenSections " - пропустить все статьи в скрытых разделах */
        } elseif ($skipItem == 'hiddenSections') {
            foreach ($SECTIONS as $sectionItem) {
                if ($sectionItem['status'] == 'hidden') {
                    $skippedSections[] = $sectionItem['sectionId'];
                    if (!empty($SECTIONS[$skipSectionId]['allChildren'])) $skippedSections += $SECTIONS[$skipSectionId]['allChildren'];
                }
            }

            /* пропустить раздел, sectionID , имени или имя fileName (section-X) */
        } elseif (strpos($skipItem, 'section-') !== false) {
            $skipSectionId = str_replace('section-', '', $skipItem);
            if (!is_numeric($skipSectionId)) {
                foreach ($SECTIONS as $sectionItem) if ($sectionItem['fileName'] == $skipSectionId) {
                    $skipSectionId = $sectionItem['sectionId'];
                    break;
                }
            }
            $skippedSections[] = $skipSectionId;
            if (!empty($SECTIONS[$skipSectionId]['allChildren'])) $skippedSections += $SECTIONS[$skipSectionId]['allChildren'];

        }
    }
    if (!empty($skippedArticles)) $where[] = "articleId NOT IN (" . implode(',', array_unique($skippedArticles)) . ")";
    if (!empty($skippedSections)) $where[] = "sectionId NOT IN (" . implode(',', array_unique($skippedSections)) . ")";
    return true;
}

/**
 * @param $fields
 * @return array|mixed|null|string
 */
function fetch_articles_filterFields(&$fields)
{
    /* освобождая от возможных ошибок */
    $fields = str_replace(' ', '', $fields);
    $fields = explode(',', $fields);
    $fields = array_flip($fields);

    /* Поля, которые должны представить */
    if (empty($fields['articleId'])) $fields['articleId'] = 1;
    $fields = implode(',', array_keys($fields));
    return $fields;
}

/**
 * @param $key
 * @param $params
 * @param string $default
 * @return bool|string
 */
function fetch_getParam($key, $params, $default = '')
{
    if (!isset($params[$key])) {
        return $default;
    } elseif (!empty($params[$key])) {
        return $params[$key];
    } else {
        return false;
    }
}

/**
 * @param $url
 * @return |null
 */
function getLastPartOfUrl($url)
{
    if (strlen($url) <= 0) {
        return null;
    }
    $urlParts = explode('/', $url);
    $countOfUrlParts = count($urlParts);
    if ($countOfUrlParts <= 0) {
        return null;
    }
    return $urlParts[$countOfUrlParts - 2];
}

/**
 * @param $url
 * @return |null
 */
function getSectionUrl($url)
{
    if (strlen($url) <= 0) {
        return null;
    }
    $urlParts = explode('/', $url);
    $countOfUrlParts = count($urlParts);
    if ($countOfUrlParts <= 0) {
        return null;
    }
    $lastMinusOnePart = $urlParts[$countOfUrlParts - 3];
    $lastPart = $urlParts[$countOfUrlParts - 2];
    return $lastMinusOnePart . '/' . $lastPart;
}


/**
 * @param $visitorIp
 */
function dieIfBanned($visitorIp)
{
    if ($ban = dbQuery('banned_ips', DB_ARRAY, array('where' => "visitorIp='$visitorIp'"))) {
        if (strtotime($ban['expiresOn']) <= time()) {
            dbQuery('banned_ips', DB_DELETE, array('where' => "visitorIp='$ban[visitorIp]'"));
            if (!dbQuery('banned_ips', DB_VALUE, array('fields' => 'COUNT(*)'))) {
                dbQuery('settings', DB_DELETE, array('where' => "codename='check_banned_ips'"));
            }
        } else {
            die("Your IP has been banned until $ban[expiresOn].");
        }
    }
}

/**
 * @param $sectionId
 * @return array
 */
function getSectionParents($sectionId)
{
    global $SECTIONS;
    if (!empty($SECTIONS[$sectionId]['parents'])) foreach ($SECTIONS[$sectionId]['parents'] as $parentId) {
        $sectionParents[] = $SECTIONS[$parentId];
    }
    $sectionParents[] = $SECTIONS[$sectionId];
    return $sectionParents;
}

/**
 * @return bool
 */
function updateLoadTime()
{
    global $visitId, $scriptStartTime, $config;
    if (!$config['statistics_enabled']) return false;

    /* экономя время нагрузки */
    $loadTime = getmicrotime() - $scriptStartTime;
    dbQuery('stats_visits', DB_UPDATE, array('where' => "visitId='$visitId'", 'values' => "loadTime='$loadTime'"));
}

/*
function writeRssVisit($sectionId){
    global $config;
    if(!$config['statistics_enabled']) return false;
    $visitId = writeVisit(7);
    dbQuery('stats_rss_visits', DB_INSERT, array('values'=>"'$visitId', '$sectionId'"));
}
*/

/**
 * @param $errorCode
 * @return bool
 */
function writeErrorVisit($errorCode)
{
    global $config, $mysqli;
    if (!$config['statistics_enabled']) return false;
    $visitId = writeVisit(6);
    $referer = !empty($_SERVER['HTTP_REFERER']) ? mysqli_real_escape_string($mysqli, $_SERVER['HTTP_REFERER']) : '';
    $requestUri = !empty($_SERVER['REQUEST_URI']) ? mysqli_real_escape_string($mysqli, $_SERVER['REQUEST_URI']) : '';
    dbQuery('stats_error_visits', DB_INSERT, array('values' => "'$visitId', '$errorCode', '$requestUri', '$referer'"));
}

/**
 * @param $query
 * @param $page
 * @return bool
 */
function writeSearchVisit($query, $page)
{
    global $config;
    if (!$config['statistics_enabled']) return false;
    $visitId = writeVisit(4);
    dbQuery('stats_search_visits', DB_INSERT, array('values' => "'$visitId', '$query', '$page'"));
}

/**
 * @param $articleId
 * @return bool
 */
function writeArticleVisit($articleId)
{
    global $config;
    if (!$config['statistics_enabled']) return false;
    $visitId = writeVisit(3);
    dbQuery('stats_article_visits', DB_INSERT, array('values' => "'$visitId', '$articleId'"));
}

/**
 * @param $articleId
 * @return bool
 */
function articleViewCounter($articleId)
{
    global $config, $userIp;
    if (!$config['view_enabled']) return false;
    if ($articleIds = dbQuery('articles', DB_ARRAY, array('fields' => 'articleId, counter', 'where' => "articleId='$articleId'"))) {
        $article_visit['articleId'] = $articleIds['articleId'];
        $article_visit['visitorIp'] = $userIp;
        if (!$visiteds = dbQuery('article_visits', DB_ARRAYS, array('where' => "visitorIp='$userIp' AND articleId='$articleId'"))) {
            if ($visited = dbQuery('article_visits', DB_INSERT, array('values' => $article_visit))) {
                dbQuery('articles', DB_UPDATE, array('where' => "articleId='$articleId'", 'values' => "counter ='$articleIds[counter]' + 1"));
            }
        }
    }
}

/**
 * @param $sectionId
 * @param $page
 * @return bool
 */
function writeSectionVisit($sectionId, $page)
{
    global $config;
    if (!$config['statistics_enabled']) return false;
    $visitId = writeVisit(2);
    dbQuery('stats_section_visits', DB_INSERT, array('values' => "'$visitId', '$sectionId', '$page'"));
}

/**
 * @param $typeId
 * @return bool|int
 */
function writeVisit($typeId)
{
    global $visitorIp, $visitorId, $visitId, $smarty, $config, $scriptStartTime, $gmNow, $mysqli;
    if (!$config['statistics_enabled']) return false;

    $cookieName = 'VisID';
    $date = gmdate('Y-m-d H:i:s');
    $visitorIp = mysqli_real_escape_string($mysqli, $_SERVER['REMOTE_ADDR']);
    $isFirst = 0;
    $isBot = 0;
    $userAgentId = 0;
    $userAgent = '';

    if (!empty($_COOKIE[$cookieName])) {
        /* Уже известно, посетитель */
        $visitorId = (int)$_COOKIE[$cookieName];
        $visitorId = dbQuery('stats_visitors', DB_VALUE, array('where' => "visitorId='$visitorId'"));
    }

    if (empty($visitorId)) {
        /* Новый посетитель или бот */
        if (!empty($_SERVER['HTTP_USER_AGENT'])) {
            $userAgent = mysqli_real_escape_string($mysqli, substr($_SERVER['HTTP_USER_AGENT'], 0, 255));
            $isBot = (int)preg_match("/($config[bot_id_regexp])/i", $_SERVER['HTTP_USER_AGENT']);
            if (!($userAgentId = (int)dbQuery('stats_user_agents', DB_VALUE, array('where' => "userAgent='$userAgent'")))) {
                $userAgentId = (int)dbQuery('stats_user_agents', DB_INSERT, array('values' => "'', '$userAgent', $isBot"));
            }
        }

        $referer = !empty($_SERVER['HTTP_REFERER']) ? mysqli_real_escape_string($mysqli, $_SERVER['HTTP_REFERER']) : '';
        $refid = preg_match("/refid=(\d+)/i", $_SERVER['REQUEST_URI'], $matches) ? (int)$matches[1] : 0;
        $smarty->assign('referer', $referer);
        if ($isBot) {
            /* Если бот , получить существующих visitorId по userAgentId */
            $visitorId = dbQuery('stats_visitors', DB_VALUE, array('fields' => 'visitorId', 'where' => "userAgentId='$userAgentId'"));
        } else {
            /* попытаться получить существующего посетителя , если он имеет отключили */
            $visitorId = dbQuery('stats_visitors', DB_VALUE, array('fields' => 'visitorId', 'where' => "userAgentId='$userAgentId' AND firstVisitOn > '$gmNow' - INTERVAL 2 HOUR AND visitorIp='$visitorIp'"));
        }

        /* вставить нового посетителя */
        if (empty($visitorId)) {
            $visitorId = dbQuery('stats_visitors', DB_INSERT, array('values' => "'', '$date', '$referer', '$refid', '$visitorIp', '$userAgentId'"));
            $isFirst = 1;
        }
        setcookie($cookieName, $visitorId, time() + 31104000, SITE_URI . '/'); /* expires in 360 days */
    }

    /* сохранения визит */
    $loadTime = getmicrotime() - $scriptStartTime;
    $visitId = dbQuery('stats_visits', DB_INSERT, array('values' => "'', '$date', '$visitorId', '$typeId', $isFirst, '$loadTime'"));

    $smarty->assign('visitorId', $visitorId);
    $smarty->assign('visitorIp', $visitorIp);
    $smarty->assign('visitId', $visitId);
    return $visitId;
}

/**
 * @return mixed
 */
function unknownUser()
{
    if (function_exists('lang')) {
        $user['fullName'] = lang('stats:unknown');
        $user['loginName'] = lang('stats:unknown');
    } else {
        $user['fullName'] = 'unknown';
        $user['loginName'] = 'unknown';
    }
    return $user;
}

/**
 * @param $section
 * @return mixed
 */
function prepareSection($section)
{
    if (!empty($section['addedOn'])) $section['addedOn'] = adjustTime($section['addedOn']);
    if (!empty($section['modifiedOn'])) $section['modifiedOn'] = adjustTime($section['modifiedOn']);

    /* получении информации о пользователях, которые создали и изменили раздел */
    if (!empty($section['addedBy'])) $userIDs[] = $section['addedBy'];
    if (!empty($section['modifiedBy'])) $userIDs[] = $section['modifiedBy'];

    if ($content = dbQuery('sections', DB_ARRAY, array('where' => "sectionId='$section[sectionId]'"))) {
        $section['content'] = $content['content'];
    }

    /* получить изображение раздела */
    $images = dbQuery('section_images', DB_ARRAYS, array('where' => "sectionId='$section[sectionId]'"));
    foreach ($images as $image) {
        if (!empty($image['codename'])) {
            if (empty($section['images'])) $section['images'] = array();
            $section['images'][$image['codename']] = $image;
        }
    }

    $gallerys = dbQuery('section_gallerys', DB_ARRAYS, array('where' => "sectionId='$section[sectionId]'"));
    foreach ($gallerys as $gallery) {
        if (empty($section['gallery'])) $section['gallery'] = array();
        $section['gallery'][] = $gallery;
    }
    /* получение картинки статьи */
    if ($files = dbQuery('section_files', DB_ARRAY, array('where' => "sectionId='$section[sectionId]'"))) {
        $section['files'] = $files;
    }

    if (!empty($userIDs)) $users = dbQuery('admin_users', DB_ARRAYS, array('where' => "userId IN('" . implode("','", $userIDs) . "')", 'indexKey' => 'userId', 'fields' => 'userId, fullName, loginName, email, accessLevel'));
    if (!empty($section['addedBy'])) $section['addedBy'] = empty($users[$section['addedBy']]) ? unknownUser() : $users[$section['addedBy']];
    if (!empty($section['modifiedBy'])) $section['modifiedBy'] = empty($users[$section['modifiedBy']]) ? unknownUser() : $users[$section['modifiedBy']];

    /* получение описания раздел и ключевые слова */
    $section += dbQuery('sections', DB_ARRAY, array('where' => "sectionId='$section[sectionId]'", 'fields' => 'meta_title, keywords, description'));

    return $section;
}

/**
 * @param $sections
 * @return mixed
 */
function prepareSections($sections)
{
    global $SECTIONS;
    foreach ($sections as $i => $section) {
        $sectionIndexes[$section['sectionId']] = $i;
        if (!empty($section['addedOn'])) $sections[$i]['addedOn'] = adjustTime($section['addedOn']);
        if (!empty($section['modifiedOn'])) $sections[$i]['modifiedOn'] = adjustTime($section['modifiedOn']);

        /* добавив информацию о разделе */
        //if(!empty($section['sectionId']) && !empty($SECTIONS[$section['sectionId']])) $sections[$i]['section'] = $SECTIONS[$section['sectionId']];

        #if(!empty($section['sectionId'])) $section[$sectionId]['parents'] = getSectionParents($section['sectionId']);

        /* сбор идентификаторы пользователей из addedBy и ModifiedBy */
        if (!empty($section['addedBy'])) $userIDs[$section['addedBy']] = $section['addedBy'];
        if (!empty($section['modifiedBy'])) $userIDs[$section['modifiedBy']] = $section['modifiedBy'];
    }
    /* получить изображение раздела */
    if (!empty($sectionIndexes)) {

        $images = dbQuery('section_images', DB_ARRAYS, array('where' => "sectionId IN(" . implode(",", array_keys($sectionIndexes)) . ")"));
        foreach ($images as $image) {
            $sectionIndex = $sectionIndexes[$image['sectionId']];
            if (!empty($image['codename'])) {
                if (empty($sections[$sectionIndex]['images'])) $sections[$sectionIndex]['images'] = array();
                $sections[$sectionIndex]['images'][$image['codename']] = $image;
                $SECTIONS[$section['sectionId']]['images'] = $image;
            }
        }

        $gallerys = dbQuery('section_gallerys', DB_ARRAYS, array('where' => "sectionId IN(" . implode(",", array_keys($sectionIndexes)) . ")"));
        foreach ($gallerys as $gallery) {
            $sectionIndex = $sectionIndexes[$gallery['sectionId']];
            if (empty($sections[$sectionIndex]['gallery'])) $sections[$sectionIndex]['gallery'] = array();
            $sections[$sectionIndex]['gallery'][] = $gallery;
        }

        $files = dbQuery('section_files', DB_ARRAYS, array('where' => "sectionId IN(" . implode(",", array_keys($sectionIndexes)) . ")"));
        foreach ($files as $file) {
            $sectionIndex = $sectionIndexes[$file['sectionId']];
            if (empty($sections[$sectionIndex]['files'])) $sections[$sectionIndex]['files'] = array();
            $sections[$sectionIndex]['files'] = $file;
        }
    }
    //print_r($sections);
    return $sections;

}


/**
 * @param $articles
 * @return mixed
 */
function prepareArticles($articles)
{
    global $SECTIONS;
    $userIDs = array();
    foreach ($articles as $i => $article) {
        $articleIndexes[$article['articleId']] = $i;
        if (!empty($article['addedOn'])) $articles[$i]['addedOn'] = adjustTime($article['addedOn']);
        if (!empty($article['modifiedOn'])) $articles[$i]['modifiedOn'] = adjustTime($article['modifiedOn']);
        if (!empty($article['publishedOn'])) $articles[$i]['publishedOn'] = adjustTime($article['publishedOn']);

        /* добавив информацию о разделе */
        if (!empty($article['sectionId']) && !empty($SECTIONS[$article['sectionId']])) $articles[$i]['section'] = $SECTIONS[$article['sectionId']];

        /* adding info about parent sections */
        #if(!empty($article['sectionId'])) $articles[$articleId]['parents'] = getSectionParents($article['sectionId']);

        /* сбор идентификаторы пользователей из addedBy и ModifiedBy */
        if (!empty($article['addedBy'])) $userIDs[$article['addedBy']] = $article['addedBy'];
        if (!empty($article['modifiedBy'])) $userIDs[$article['modifiedBy']] = $article['modifiedBy'];
    }

    /* получать изображения в статье*/
    if (!empty($articleIndexes)) {

        $images = dbQuery('article_images', DB_ARRAYS, array('where' => "articleId IN(" . implode(",", array_keys($articleIndexes)) . ")"));
        foreach ($images as $image) {
            $articleIndex = $articleIndexes[$image['articleId']];
            if (!empty($image['codename'])) {

                if (empty($articles[$articleIndex]['images'])) $articles[$articleIndex]['images'] = array();
                $articles[$articleIndex]['images'][$image['codename']] = $image;
                //print_r($image);
            }
        }

        $gallerys = dbQuery('article_gallerys', DB_ARRAYS, array('where' => "articleId IN(" . implode(",", array_keys($articleIndexes)) . ")"));
        foreach ($gallerys as $gallery) {
            $articleIndex = $articleIndexes[$gallery['articleId']];
            if (empty($articles[$articleIndex]['gallery'])) $articles[$articleIndex]['gallery'] = array();
            $articles[$articleIndex]['gallery'][] = $gallery;
        }

        /* получение картинки статьи */
        $files = dbQuery('article_files', DB_ARRAYS, array('where' => "articleId IN(" . implode(",", array_keys($articleIndexes)) . ")"));
        foreach ($files as $file) {
            $articleIndex = $articleIndexes[$file['articleId']];
            if (empty($articles[$articleIndex]['files'])) $articles[$articleIndex]['files'] = array();
            $articles[$articleIndex]['files'] = $file;
        }

    }

    /* получении информации о пользователе, который создал и изменил статью */
    if (!empty($userIDs)) {
        $users = dbQuery('admin_users', DB_ARRAYS, array('where' => "userId IN('" . implode("','", $userIDs) . "')", 'indexKey' => 'userId', 'fields' => 'userId, fullName, loginName, email, accessLevel'));
        foreach ($articles as $articleId => $article) {
            $articles[$articleId]['addedBy'] = empty($users[$article['addedBy']]) ? unknownUser() : $users[$article['addedBy']];
            $articles[$articleId]['modifiedBy'] = empty($users[$article['modifiedBy']]) ? unknownUser() : $users[$article['modifiedBy']];
        }
    }
    return $articles;
}

/**
 * @param $article
 * @return mixed
 */
function prepareArticle($article)
{
    global $SECTIONS;
    if (!empty($article['addedOn'])) $article['addedOn'] = adjustTime($article['addedOn']);
    if (!empty($article['modifiedOn'])) $article['modifiedOn'] = adjustTime($article['modifiedOn']);
    if (!empty($article['publishedOn'])) $article['publishedOn'] = adjustTime($article['publishedOn']);

    /* получать статьи изображения */
    if (!empty($article['articleId'])) {
        $images = dbQuery('article_images', DB_ARRAYS, array('where' => "articleId='$article[articleId]'"));
        foreach ($images as $image) {
            if (!empty($image['codename'])) {
                if (empty($article['images'])) $article['images'] = array();
                $article['images'][$image['codename']] = $image;
            }
        }

        $gallerys = dbQuery('article_gallerys', DB_ARRAYS, array('where' => "articleId='$article[articleId]'"));
        foreach ($gallerys as $gallery) {
            if (empty($article['gallery'])) $article['gallery'] = array();
            $article['gallery'][] = $gallery;
        }

    }

    /* получении информации о пользователях, которые создали и изменили статью */
    if (!empty($article['addedBy'])) $userIDs[] = $article['addedBy'];
    if (!empty($article['modifiedBy'])) $userIDs[] = $article['modifiedBy'];
    if (!empty($userIDs)) $users = dbQuery('admin_users', DB_ARRAYS, array('where' => "userId IN('" . implode("','", $userIDs) . "')", 'indexKey' => 'userId', 'fields' => 'userId, fullName, loginName, email, accessLevel'));
    if (!empty($article['addedBy'])) $article['addedBy'] = empty($users[$article['addedBy']]) ? unknownUser() : $users[$article['addedBy']];
    if (!empty($article['modifiedBy'])) $article['modifiedBy'] = empty($users[$article['modifiedBy']]) ? unknownUser() : $users[$article['modifiedBy']];

    /* добавив информацию о статье раздела */
    if (!empty($article['sectionId']) && !empty($SECTIONS[$article['sectionId']])) $article['section'] = $SECTIONS[$article['sectionId']];

    /* добавив информацию о родительских разделах */
    #if(!empty($article['sectionId'])) $article['parents'] = getSectionParents($article['sectionId']);

    return $article;
}

/**
 * @param $sliders
 * @return mixed
 */
function prepareSliders($sliders)
{
    $userIDs = array();
    foreach ($sliders as $i => $slider) {
        $sliderIndexes[$slider['sliderId']] = $i;
        if (!empty($slider['addedOn'])) $sliders[$i]['addedOn'] = adjustTime($slider['addedOn']);
        if (!empty($slider['modifiedOn'])) $sliders[$i]['modifiedOn'] = adjustTime($slider['modifiedOn']);
        if (!empty($slider['publishedOn'])) $sliders[$i]['publishedOn'] = adjustTime($slider['publishedOn']);

        /* сбор идентификаторы пользователей из addedBy и ModifiedBy */
        if (!empty($slider['addedBy'])) $userIDs[$slider['addedBy']] = $slider['addedBy'];
        if (!empty($slider['modifiedBy'])) $userIDs[$slider['modifiedBy']] = $slider['modifiedBy'];
    }

    /* получать статьи изображения */
    if (!empty($sliderIndexes)) {
        $images = dbQuery('slider_images', DB_ARRAYS, array('where' => "sliderId IN(" . implode(",", array_keys($sliderIndexes)) . ")"));
        foreach ($images as $image) {
            $sliderIndex = $sliderIndexes[$image['sliderId']];
            if (!empty($image['codename'])) {
                if (empty($sliders[$sliderIndex]['images'])) $sliders[$sliderIndex]['images'] = array();
                $sliders[$sliderIndex]['images'][$image['codename']] = $image;
            }
        }
    }

    /* получение информации о пользователях, которые создали или изменили слайд */
    if (!empty($userIDs)) {
        $users = dbQuery('admin_users', DB_ARRAYS, array('where' => "userId IN('" . implode("','", $userIDs) . "')", 'indexKey' => 'userId', 'fields' => 'userId, fullName, loginName, email, accessLevel'));
        foreach ($sliders as $sliderId => $slider) {
            $sliders[$sliderId]['addedBy'] = empty($users[$slider['addedBy']]) ? unknownUser() : $users[$slider['addedBy']];
            $sliders[$sliderId]['modifiedBy'] = empty($users[$slider['modifiedBy']]) ? unknownUser() : $users[$slider['modifiedBy']];
        }
    }
    return $sliders;
}

/**
 * @param $adminUsers
 * @return mixed
 */
function prepareAdminUsers($adminUsers)
{
    foreach ($adminUsers as $i => $adminUser) {
        $adminUserIndexes[$adminUser['userId']] = $i;
    }

    if (!empty($adminUserIndexes)) {
        $images = dbQuery('admin_user_images', DB_ARRAYS, array('where' => "userId IN(" . implode(",", array_keys($adminUserIndexes)) . ")"));
        foreach ($images as $image) {
            $adminUserIndex = $adminUserIndexes[$image['userId']];
            if (!empty($image['codename'])) {
                if (empty($adminUsers[$adminUserIndex]['images'])) $adminUsers[$adminUserIndex]['images'] = array();
                $adminUsers[$adminUserIndex]['images'][$image['codename']] = $image;
            }
        }
    }
    return $adminUsers;
}

/**
 * @param $adminUser
 * @return mixed
 */
function prepareAdminUser($adminUser)
{
    if (!empty($adminUser['userId'])) {
        $images = dbQuery('admin_user_images', DB_ARRAYS, array('where' => "userId = '$adminUser[userId]'"));
        foreach ($images as $image) {
            if (!empty($image['codename'])) {
                if (empty($adminUser['images'])) $adminUser['images'] = array();
                $adminUser['images'][$image['codename']] = $image;
            }
        }
    }
    return $adminUser;
}

/**
 * @param $user
 * @return mixed
 */
function prepareUser($user)
{
    if (!empty($user['userId'])) {
        $images = dbQuery('admin_user_images', DB_ARRAYS, array('where' => "userId = '$user[userId]'"));
        foreach ($images as $image) {
            if (!empty($image['codename'])) {
                if (empty($user['images'])) $user['images'] = array();
                $user['images'][$image['codename']] = $image;
            }
        }
    }
    return $user;
}

/**
 * @param $customer
 * @return mixed
 */
function prepareCustomer($customer)
{
    if (!empty($customer['userId'])) {
        $images = dbQuery('customer_images', DB_ARRAYS, array('where' => "userId = '$customer[userId]'"));
        foreach ($images as $image) {
            if (!empty($image['codename'])) {
                if (empty($customer['images'])) $customer['images'] = array();
                $customer['images'][$image['codename']] = $image;
            }
        }
    }
    return $customer;
}

/**
 * @param string $date
 * @param bool $isReverse
 * @param string $outputFormat
 * @return false|string
 */
function adjustTime($date = '', $isReverse = false, $outputFormat = 'Y-m-d H:i:s')
{
    global $config;
    if (empty($date)) $date = gmdate('Y-m-d H:i:s');
    $adjH = $config['hour_adjustment'] * ($isReverse ? -1 : 1);
    $adjM = $config['minute_adjustment'] * ($isReverse ? -1 : 1);
    $time = strtotime("$adjH hours $adjM minutes", strtotime($date));
    //print_r($adjH);
    return date($outputFormat, $time);
}

/**
 * @return int
 */
function getSettings()
{
    $config = dbQuery('settings', DB_ARRAYS, array('fields' => 'codename, value', 'indexKey' => 'codename', 'valueKey' => 'value'));
    return $config;
}


/**
 * @return int
 */
function getSettingsMaps()
{
    $maps = dbQuery('maps', DB_ARRAYS, array('fields' => 'codename, value', 'indexKey' => 'codename', 'valueKey' => 'value'));
    return $maps;
}

/**
 * @param $totalItems
 * @param $currentPage
 * @param int $itemsPerPage
 * @param int $firstSet
 * @param int $beforeCurrent
 * @param int $afterCurrent
 * @param int $lastSet
 * @param string $path
 * @param bool $rewrite
 * @return array|bool
 */
function getPageNums($totalItems, $currentPage, $itemsPerPage = 10, $firstSet = 5, $beforeCurrent = 2, $afterCurrent = 2, $lastSet = 5, $path = '', $rewrite = true)
{
    global $config;
    $totalPages = ceil($totalItems / $itemsPerPage);
    if ($currentPage > $totalPages) return false;

    $pageNums['totalPages'] = $totalPages;
    $pageNums['totalItems'] = $totalItems;
    $pageNums['currentPage'] = $currentPage;
    $pageNums['startIteration'] = ($currentPage - 1) * $itemsPerPage + 1;
    $pageNums['endIteration'] = $currentPage * $itemsPerPage;
    if ($pageNums['endIteration'] > $totalItems) $pageNums['endIteration'] = $totalItems;

    /* первые X */
    if ($firstSet > 0) for ($i = 1; $i <= ($totalPages > $firstSet ? $firstSet : $totalPages); $i++) $pages[$i] = $i;

    /* X справа, X слева */
    for ($i = ($currentPage - $beforeCurrent); $i <= ($currentPage + $afterCurrent); $i++) {
        if ($i > 0 && $i <= $totalPages) $pages[$i] = $i;
    }

    /* последние X */
    if ($lastSet > 0) for ($i = ($totalPages - $lastSet + 1); $i <= $totalPages; $i++) if ($i > 0) $pages[$i] = $i;

    /* расставляем точки */
    $i = 0;
    if (!empty($pages) && count($pages) > 1) {
        asort($pages);
        $prevPage = 0;
        foreach ($pages as $page) {
            if (($page - $prevPage) > 1 && $i > 0) {
                array_splice($pages, $i, 0, '...');
                $i++;
            }
            $prevPage = $page;
            $i++;
        }
        $pageNums['pages'] = $pages;
    }

    /* следующая страница */
    if (($currentPage + 1) <= $totalPages) {
        if (empty($path)) {
            $pageNums['nextPage'] = $currentPage + 1;
        } else {
            $pageNums['nextPage']['num'] = $currentPage + 1;
            if ($rewrite) {
                $pageNums['nextPage']['url'] = $path . "/page" . ($currentPage + 1) . ".$config[file_extension]";
            } else {
                $pageNums['nextPage']['url'] = $path . "page=" . ($currentPage + 1);
            }
        }
    }

    /* предыдущая страница */
    if (($currentPage - 1) >= 1) {
        if (empty($path)) {
            $pageNums['previousPage'] = $currentPage - 1;
        } else {
            $pageNums['previousPage']['num'] = $currentPage - 1;
            if ($rewrite) {
                if (($currentPage - 1) == 1) {
                    $pageNums['previousPage']['url'] = $path . "/";
                } else {
                    $pageNums['previousPage']['url'] = $path . "/page" . ($currentPage - 1) . ".$config[file_extension]";
                }
            } else {
                $pageNums['previousPage']['url'] = $path . "page=" . ($currentPage - 1);
            }
        }
    }

    /* первая страница */
    if ($currentPage != 1) {
        if (empty($path)) {
            $pageNums['firstPage'] = $currentPage - 1;
        } else {
            $pageNums['firstPage']['num'] = $currentPage - 1;
            if ($rewrite) {
                $pageNums['firstPage']['url'] = $path . "/";
            } else {
                $pageNums['firstPage']['url'] = $path . "page=1";
            }
        }
    }

    /* последняя страница */
    if ($currentPage != $totalPages) {
        if (empty($path)) {
            $pageNums['lastPage'] = $currentPage - 1;
        } else {
            $pageNums['lastPage']['num'] = $currentPage - 1;
            if ($rewrite) {
                $pageNums['lastPage']['url'] = $path . "/page$totalPages.$config[file_extension]";
            } else {
                $pageNums['lastPage']['url'] = $path . "page=$totalPages";
            }
        }
    }

    if (!empty($pageNums)) {
        if (!empty($path) && !empty($pageNums['pages'])) foreach ($pageNums['pages'] as $i => $page) {
            $pageNums['pages'][$i] = array();
            $pageNums['pages'][$i]['num'] = $page;
            if ($rewrite) {
                if ($page == 1) {
                    $pageNums['pages'][$i]['url'] = $path . "/";
                } else {
                    $pageNums['pages'][$i]['url'] = $path . "/page$page.$config[file_extension]";
                }
            } else {
                $pageNums['pages'][$i]['url'] = $path . "page=$page";
            }
        }
        return $pageNums;
    } else {
        return array();
    }
}


/**
 * @param string $varName
 * @param string $defaultVal
 * @param bool $noEscape
 * @param bool $checkCookie
 * @return array|bool|string
 */
function getRequestVar($varName = '', $defaultVal = '', $noEscape = false, $checkCookie = false)
{
    global $smarty;
    if ($varName) {
        if (isset($_POST[$varName])) {
            $varValue = $_POST[$varName];
        } elseif (isset($_GET[$varName])) {
            $varValue = $_GET[$varName];
        } elseif (isset($_COOKIE[$varName]) && $checkCookie) {
            $varValue = $_COOKIE[$varName];
        }
    } elseif (!empty($_POST)) {
        $varValue = $_POST;
    } elseif (!empty($_GET)) {
        $varValue = $_GET;
    } elseif (!empty($_COOKIE) && $checkCookie) {
        $varValue = $_COOKIE;
    }

    if (isset($varValue)) {
        if (get_magic_quotes_gpc()) $varValue = arrStripSlashes($varValue);
        $smarty->assign($varName, $varValue);
        $varValue = $noEscape ? $varValue : arrAddSlashes($varValue);
        return $varValue;
    } elseif (!empty($defaultVal)) {
        $smarty->assign($varName, $defaultVal);
        $defaultVal = $noEscape ? $defaultVal : arrAddSlashes($defaultVal);
        return $defaultVal;
    } else {
        return false;
    }
}

/**
 * @param $var
 * @return array|string
 */
function arrMysqlEscape($var)
{
    global $mysqli;
    if (is_array($var)) {
        return array_map('arrMysqlEscape', $var);
    } else {
        return mysqli_real_escape_string($mysqli, $var);
    }
}

/**
 * @param $var
 * @return array|string
 */
function arrAddSlashes($var)
{
    if (is_array($var)) {
        return array_map('arrAddSlashes', $var);
    } else {
        return addslashes($var);
    }
}

/**
 * @param $var
 * @return array|string
 */
function arrStripSlashes($var)
{
    if (is_array($var)) {
        return array_map('arrStripSlashes', $var);
    } else {
        return stripslashes($var);
    }
}

/**
 * @param $var
 * @return array|string
 */
function array_preg_quote($var)
{
    if (is_array($var)) {
        return array_map('array_preg_quote', $var);
    } else {
        return preg_quote($var, '/');
    }
}

/**
 * @param $params
 * @return string
 */
function insert_workTime($params)
{
    return number_format(getMicroTime() - $GLOBALS['scriptStartTime'], isset($params['decimals']) ? $params['decimals'] : 2);
}

/**
 * @param $params
 * @return int
 */
function insert_dbTotalQueries($params)
{
    return (int)$GLOBALS['dbTotalQueries'];
}

/**
 * @param $params
 * @return string
 */
function insert_dbQueryTime($params)
{
    return number_format($GLOBALS['dbQueryTime'], isset($params['decimals']) ? $params['decimals'] : 2);
}

/**
 * @return float
 */
function getMicroTime()
{
    list($usec, $sec) = explode(' ', microtime());
    return ((float)$usec + (float)$sec);
}

/*
function rss_get_template ($tpl_name, &$tpl_source, &$smarty_obj) {
    $tpl_source = '{$smarty_function_fetch_rss_data|smarty:nodefaults}';
    return true;
}
function rss_get_timestamp($tpl_name, &$tpl_timestamp, &$smarty_obj) {
    $tpl_timestamp = 0;
    return true;
}
function rss_get_secure($tpl_name, &$smarty_obj) {
    return true;
}
function rss_get_trusted($tpl_name, &$smarty_obj) {
    // not used for templates
}
*/

/**
 * @param $var
 * @param bool $lower
 * @param bool $punkt
 * @return mixed|null|string|string[]
 */
function totranslit($var, $lower = true, $punkt = true)
{
    global $L;

    if (is_array($var)) return "";

    $var = str_replace(chr(0), '', $var);

    $var = trim(strip_tags($var));
    $var = preg_replace("/\s+/u", "-", $var);
    $var = str_replace("/", "-", $var);

    /*
      if (is_array($langtranslit) AND count($langtranslit) ) {
          $var = strtr($var, $langtranslit);
      }
    */

    if ($punkt) $var = preg_replace("/[^a-z0-9\_\-.]+/mi", "", $var);
    else $var = preg_replace("/[^a-z0-9\_\-]+/mi", "", $var);

    $var = preg_replace('#[\-]+#i', '-', $var);
    $var = preg_replace('#[.]+#i', '.', $var);

    if ($lower) $var = strtolower($var);

    $var = str_ireplace(".php", "", $var);
    $var = str_ireplace(".php", ".ppp", $var);

    if (strlen($var) > 200) {

        $var = substr($var, 0, 200);

        if (($temp_max = strrpos($var, '-'))) $var = substr($var, 0, $temp_max);
    }

    return $var;
}

/**
 * @param $file
 * @return string
 */
function file_read($file)
{
    $buffer = "";

    if (is_file($file)) {
        $buffer .= file_get_contents($file);
    }
    return $buffer;
}

/**
 * @param $email
 * @return bool|string
 */
function isValidEmail($email)
{
    if (is_array($email) || is_numeric($email) || is_bool($email) || is_float($email) || is_file($email) || is_dir($email) || is_int($email))
        return false;
    else {
        $email = trim(strtolower($email));
        if (filter_var($email, FILTER_VALIDATE_EMAIL) !== false) return $email;
        else {
            $pattern = '/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD';
            return (preg_match($pattern, $email) === 1) ? $email : false;
        }
    }
}
