<?php
/**
 * 建立到MySQL服务器的连接
 *
 * @param  string $hostname 数据库服务器地址
 * @param  string $username 用户名
 * @param  string $password 密码
 * @param  string $database 数据库名称
 * @return object           PDO对象
 */
function connect($hostname, $username, $password, $database)
{
    $pdo = new PDO('mysql:host=' . $hostname . ';dbname=' . $database, $username, $password);
    return $pdo;
}

function getVersion()
{
    global $pdo;
    $sql = 'SELECT VERSION() as version';
    $stmt = $pdo->query($sql);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row['version'];
}

/**
 * 插入记录
 *
 * @param  string $table    数据表名称
 * @param  array  $bindings 由字段名称和字段值组成的关联数组
 * @return int              被插入的记录数
 */
function insert($table, $bindings)
{
    global $pdo;
    $fields = join(',', array_keys($bindings));
    $values = '\'' . join('\',\'', $bindings) . '\'';
    $sql = 'INSERT ' . $table . '(' . $fields . ') VALUES(' . $values . ')';
    $affectedRows = $pdo->exec($sql);
    return $affectedRows;
}
/**
 * 获取最后插入记录的ID
 *
 * @param  void
 * @return string
 */
function lastInsertId()
{
    global $pdo;
    return $pdo->lastInsertId();
}

/**
 * 删除记录
 *
 * @param  string $table 数据表名称
 * @param  string $where 条件表达式(默认值为null)
 * @return int           被删除的记录数
 */
function delete($table, $where = null)
{
    global $pdo;
    $sql = 'DELETE FROM ' . $table . (is_null($where) ? null : ' WHERE ' . $where);
    $affectedRows = $pdo->exec($sql);
    return $affectedRows;
}

/**
 * 更新记录
 *
 * @param  string $table    数据表名称
 * @param  array  $bindings 由字段名称和字段值组成的关联数组
 * @param  string $where    条件表达式(默认值为null)
 * @return int              被更新的记录数
 */
function update($table, $bindings, $where = null)
{
    global $pdo;
    $setting = null;
    foreach ($bindings as $field => $value) {
        if (substr($value, 0, 3) == 'raw') {
            $setting .= (is_null($setting) ? null : ',') . $field . '=' . substr($value, 4, -1);
        } else {
            $setting .= (is_null($setting) ? null : ',') . $field . '=\'' . $value . '\'';
        }
    }
    $sql = 'UPDATE ' . $table . ' SET ' . $setting . (is_null($where) ? null : ' WHERE ' . $where);
    $affectedRows = $pdo->exec($sql);
    return $affectedRows;
}

/**
 * 计数
 * @param  string $table 数据表名称
 * @param  string $field 字段名称(默认为id字段)
 * @param  string $where 条件表达式
 * @return int           计数的结果
 */
function counts($table, $field = 'id', $where = null)
{
    global $pdo;
    $sql = 'SELECT COUNT(' . $field . ') AS count FROM ' . $table . (is_null($where) ? null : ' WHERE ' . $where);
    $stmt = $pdo->query($sql);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row['count'];
}

function maximum($table, $field, $where = null)
{
}
function minimum($table, $field, $where = null)
{
}
function avg($table, $field, $where = null)
{
}
function sum($table, $field, $where = null)
{
}
/**
 * 查找记录
 *
 * @param  string $table 数据表名称
 * @return array         返回结果集
 */
function select($table, $array = ['fields' => '*'])
{
    global $pdo;

    $sql = 'SELECT ' . $array['fields'] . ' FROM ' . $table;

    //多表连接操作

    if (isset($array['innerJoin'])) {
        $sql .= ' INNER JOIN ' . $array['innerJoin']['table'] . ' ON ' . $array['innerJoin']['on'];
    }

    if (isset($array['leftJoin'])) {
        $sql .= ' LEFT JOIN ' . $array['leftJoin']['table'] . ' ON ' . $array['leftJoin']['on'];
    }

    if (isset($array['rightJoin'])) {
        $sql .= ' RIGHT JOIN ' . $array['rightJoin']['table'] . ' ON ' . $array['rightJoin']['on'];
    }

    //依次判断在$array参数是否出现过相应的成员,如果出现,则在SQL要拼接相关的子句

    if (isset($array['where'])) {
        $sql .= ' WHERE ' . $array['where'];
    }

    if (isset($array['group'])) {
        $sql .= ' GROUP BY ' . $array['group'];
    }

    if (isset($array['having'])) {
        $sql .= ' HAVING ' . $array['having'];
    }

    if (isset($array['order'])) {
        $sql .= ' ORDER BY  ' . $array['order'];
    }

    if (isset($array['limit'])) {
        $sql .= ' LIMIT  ' . $array['limit'];
    }
    $stmt = $pdo->query($sql);
    // echo $sql;
    $rowset = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rowset;
}

function selectOne($table, $array = ['fields' => '*'])
{
    $array = select($table, $array);
    return array_shift($array);
}
