<?php

class Premium extends ObjectData
{
    private static function isSlotNotEmpty($SQL, $playerId, $pid)
    {
        return $SQL->query('SELECT ' . $SQL->fieldName('pid') . ' FROM ' . $SQL->tableName('player_items') . ' WHERE ' . $SQL->fieldName('player_id') . ' = ' . $playerId . ' AND ' . $SQL->fieldName('pid') . ' = ' . $pid . ';')->fetch() != null;
    }

    static function tryToPurchase($selectedItem, $playerId, $points, $account, $SQL, $pid)
    {
        if ($points < $selectedItem[4]) {
            Alert::showMessage("You dont have enough points.");
        } else if ($account->isOnline($playerId)) {
            Alert::showMessage("You have to logout your selected character.");
        } else if (Premium::isSlotNotEmpty($SQL, $playerId, $pid)) {
            Alert::showMessage("You have to remove the item in your Arrow slot.");
        } else {
            Premium::purchase($SQL, $playerId, $pid, $selectedItem[0], 1, 0, $selectedItem[4], $account);
            Alert::showMessage('Congratulations, now you can log into your character and use your item.');
        }
    }

    static function purchase($SQL, $player_id, $pid, $item, $count, $attr, $points, $account)
    {
        $nextSid = $SQL->query('SELECT ' . 'MAX(' . $SQL->fieldName('sid') . ') FROM ' . $SQL->tableName('player_items') . ' WHERE ' . $SQL->fieldName('player_id') . ' = ' . $player_id . ';')->fetch();
        $keys = array('player_id', 'pid', 'sid', 'itemtype', 'count', 'attributes');
        $values = array($player_id, $pid, ++$nextSid[0], $item, $count, $attr);

        $SQL->query('INSERT INTO ' . $SQL->tableName('player_items') . ' (' . implode(', ', $keys) . ') VALUES (' . implode(', ', $values) . ')');
        $account->updatePoints($points);
    }

}