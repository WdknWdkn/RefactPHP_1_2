<?php
/**
 * 1-2. 変数名は使い回さないのも大事
 * 前回は変数名をちゃんとつけたと思いましたが。。。よくよく見ると意味が途中で変わっていましたので。
 * そこも改めてちゃんと命名し直します。
 * 
 * ゲームでキャラクタが攻撃をしたときのダメージ量を計算するロジック
 * $playerArmPower：プレイヤー本体の攻撃力
 * $playerArmWeapon:プレイヤーの武器の攻撃力
 * $enemyBodyDefence：敵本体の防御力
 * $enemyArmorDefence：敵の防具の防御力
 */
 function before($playerArmPower,$playerArmWeapon, $enemyBodyDefence, $enemyArmorDefence)
 {
     // 与えるダメージの総量　←　このへんがまるっと同じ変数「$damageAmount」なので雑
     $damageAmount = 0;
     // 与えるダメージの合計を出す
     $damageAmount = $playerArmPower + $playerArmWeapon;
     // 敵の防御力の合計を、与えるダメージから引いて、実際のダメージを出す
     $damageAmount = $damageAmount - (($enemyBodyDefence + $enemyArmorDefence) / 2);
     // ダメージ量はマイナスにはならないので調整
     if ($damageAmount < 0) {
         $damageAmount = 0;
     }
     return $damageAmount;
 }

 function after($playerArmPower,$playerArmWeapon, $enemyBodyDefence, $enemyArmorDefence)
 {
     // 与えるダメージの総量　←　あくまでこの定義でいていただいて
     $damageAmount = 0;
     // 与えるダメージの合計を出す　←　ここをちゃんと新しい変数で定義する
     $totalPlayerAttackPower = $playerArmPower + $playerArmWeapon;
     // 敵の防御力の合計を、与えるダメージから引いて、実際のダメージを出す ←　ここは一度与えるダメージを別で定義する
     $totalEnemyDefence = $enemyBodyDefence + $enemyArmorDefence;
     // ダメージ量を再度計算
     $damageAmount = $totalPlayerAttackPower - ($totalEnemyDefence/2);
     // ダメージ量はマイナスにはならないので調整
     if ($damageAmount < 0) {
         $damageAmount = 0;
     }
     return $damageAmount;
 }

 echo after(100,10,50,15);