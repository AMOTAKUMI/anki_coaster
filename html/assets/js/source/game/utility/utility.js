//wpからデータ取得
var Utility = function () {
    //none props
};

//シャッフル
Utility.prototype.shuffle = function(array){
    return _.shuffle(array);
};

//配列化
Utility.prototype.toArray = function(obj){
    return _.map(obj,function(val){ return val;});
};


/* ---------------------------------------------------
 Export Module
 -------------------------------------------------- */

module.exports = Utility;
