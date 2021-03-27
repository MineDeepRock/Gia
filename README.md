
TODO:  
追尾系で相手が死んだときの処理
  
Invoker→invoke()  
executer→execute()  
ActiveGia～～→execute()  
はおかしい  
  
呼び出し→発動→実行の順番に命名し直す

# ギアエフェクト
## バフ
- [x] 防御力アップ
- [x] 攻撃力アップ
- [x] 命中率アップ
- [x] 回避率アップ
- [ ] エネルギーの回復速度をアップ
- [ ] HP回復速度アップ
- [x] 移動速度アップ


## デバフ
- [x] 防御力ダウン
- [x] 攻撃力ダウン
- [x] 命中率ダウン
- [x] 回避率ダウン
- [ ] エネルギーの回復速度をダウン
- [ ] HP回復速度ダウン
- [x] 移動速度ダウン
- [ ] 画面酔
- [ ] 盲目


ステータス
- 防御力
- 攻撃力
- 命中率
- 回避率
- HP回復速度
- 移動速度

攻撃系魔法
- 攻撃力
- 命中率
- エネルギーの消費量
- 相手or自身or仲間に与えるエフェクト

エフェクト(バフ,デバフ)
性能
- 継続時間
- 量

種類
- 防御力アップorダウン
- 攻撃力アップorダウン
- 命中率アップorダウン
- 回避率アップorダウン
- HP回復速度アップorダウン


# ギア
## 攻撃系ギア  
- ダメージ
- 命中率
- 攻撃範囲

- [x] ice ball 敵単体に氷の塊を飛ばす
- [x] ice stalactite 敵複数に氷の塊を飛ばす



## 防衛系ギア  
- [ ] wall
- [ ] decoy
- [ ] counter

## 回復系ギア
- [ ] cure 自身のHPを一定量回復 
- [ ] cure around 自身+味方のHPを一定量回復 

- [ ] tune 自身にランダムでデバフを付与してHPを完全に回復 

- [ ] detune 自身のバフを消去してHPを完全に回復 

- [ ] recovery  自身のHP時間回復
- [ ] recovery around  自身+味方のHP時間回復

- [ ] clean 自身のバフとデバフを消去

- [ ] inspection 自身のデバフを消去
- [ ] inspection around 自身+味方のデバフを消去

- [ ] maintenance 自身のデバフを消去してHPを回復
- [ ] maintenance around 自身+味方のデバフを消去してHPを回復

## バフ系ギア
#### 単体
- [ ] aggressive mode 自身の攻撃力が一定時間アップ
- [ ] aggressive mode around 自身+味方の攻撃力が一定時間アップ

- [ ] armored skin 自身の防御力が一定時間アップ
- [ ] armored skin around 自身+味方の防御力が一定時間アップ

- [ ] birds sight 自身の命中率を一定時間アップ
- [ ] birds sight around 自身+味方の命中率を一定時間アップ

- [ ] ghost walker 自身の回避率を一定時間アップ
- [ ] ghost walker around 自身+味方の回避率を一定時間アップ

- [ ] rapid walker 自身の移動速度を一定時間アップ
- [ ] rapid walker around 自身+味方の移動速度を一定時間アップ

- [ ] accelerate heart 自身の回復速度を一定時間アップ
- [ ] accelerate heart around 自身+味方の回復速度を一定時間アップ

#### 複合
- [ ] full spec 自身の攻撃力 防御力を一定時間アップ
- [ ] full spec around 自身+味方の攻撃力 防御力を一定時間アップ

- [ ] aggressive eyes 自身の攻撃力 命中率をを一定時間アップ
- [ ] aggressive eyes around 自身+味方の攻撃力 命中率をを一定時間アップ

- [ ] aggressive runner 自身の攻撃力 移動速度を一定時間アップ
- [ ] aggressive runner around 自身の攻撃力 移動速度を一定時間アップ

- [ ] armored ghost walker 自身の防御力 回避率を一定時間アップ
- [ ] armored ghost walker around 自身+味方の防御力 回避率を一定時間アップ

- [ ] ghost runner 自身の回避率 移動速度を一定時間アップ
- [ ] ghost runner around 自身+味方の回避率 移動速度を一定時間アップ

## デバフ系ギア
- [ ] downer 敵単体の攻撃力が一定時間ダウン
- [ ] downer around 敵複数の攻撃力が一定時間ダウン

- [ ] break skin 敵単体の防御力が一定時間ダウン
- [ ] break skin around 敵複数の防御力が一定時間ダウン

- [ ] insect sight 敵単体の命中率を一定時間ダウン
- [ ] insect sight around 敵複数の命中率を一定時間ダウン

- [ ] ghost killer 敵単体の回避率を一定時間ダウン
- [ ] ghost killer around 敵複数の回避率を一定時間ダウン

- [ ] rapid killer 敵単体の移動速度を一定時間ダウン
- [ ] rapid killer around 敵複数の移動速度を一定時間ダウン

- [ ] small heart 敵単体の回復速度を一定時間ダウン
- [ ] small heart around 敵複数の回復速度を一定時間ダウン

- [ ] mirage 敵単体にめまいの効果を与える
- [ ] mirage around 敵複数にめまいの効果を与える

- [ ] blind sight 敵単体に盲目
- [ ] blind sight around 敵複数に盲目の効果を与える

