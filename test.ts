import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class DataService {

  private url = 'http://localhost/get_data.php';

  constructor(private http: HttpClient) { }

  getData(): Observable<any> {
    return this.http.get<any>(this.url);
  }
}

import { Component, OnInit } from '@angular/core';
import { DataService } from './data.service';

@Component({
  selector: 'app-root',
  template: `
    <div *ngFor="let item of data">
      <p>{{ item.name }}</p>
      <p>{{ item.message }}</p>
      <ul>
        <li *ngFor="let comment of item.comments">{{ comment }}</li>
      </ul>
    </div>
  `
})
export class AppComponent implements OnInit {

  data: any[];

  constructor(private dataService: DataService) { }

  ngOnInit() {
    this.dataService.getData().subscribe((data) => {
      this.data = data;
    });
  }
}
