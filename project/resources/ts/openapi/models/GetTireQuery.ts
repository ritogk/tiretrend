/* tslint:disable */
/* eslint-disable */
/**
 * OpenAPI Tutorial
 * OpenAPI Tutorial by halhorn
 *
 * The version of the OpenAPI document: 0.0.0
 * 
 *
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

import { exists, mapValues } from '../runtime';
/**
 * GET /trie クエリ
 * @export
 * @interface GetTireQuery
 */
export interface GetTireQuery {
    /**
     * 期間(開始) YYYY/MM/DD
     * @type {string}
     * @memberof GetTireQuery
     */
    periodStart?: string;
    /**
     * 期間(終了) YYYY/MM/DD
     * @type {string}
     * @memberof GetTireQuery
     */
    periodEnd?: string;
    /**
     * メーカー
     * @type {string}
     * @memberof GetTireQuery
     */
    maker?: string;
    /**
     * タイプ
     * @type {string}
     * @memberof GetTireQuery
     */
    type?: string;
}

export function GetTireQueryFromJSON(json: any): GetTireQuery {
    return GetTireQueryFromJSONTyped(json, false);
}

export function GetTireQueryFromJSONTyped(json: any, ignoreDiscriminator: boolean): GetTireQuery {
    if ((json === undefined) || (json === null)) {
        return json;
    }
    return {
        
        'periodStart': !exists(json, 'periodStart') ? undefined : json['periodStart'],
        'periodEnd': !exists(json, 'periodEnd') ? undefined : json['periodEnd'],
        'maker': !exists(json, 'maker') ? undefined : json['maker'],
        'type': !exists(json, 'type') ? undefined : json['type'],
    };
}

export function GetTireQueryToJSON(value?: GetTireQuery | null): any {
    if (value === undefined) {
        return undefined;
    }
    if (value === null) {
        return null;
    }
    return {
        
        'periodStart': value.periodStart,
        'periodEnd': value.periodEnd,
        'maker': value.maker,
        'type': value.type,
    };
}

