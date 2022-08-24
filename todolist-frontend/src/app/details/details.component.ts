import { Component, Inject, Input, OnInit } from '@angular/core';

@Component({
  selector: 'app-details',
  templateUrl: './details.component.html',
  styleUrls: ['./details.component.scss'],
})
export class DetailsComponent implements OnInit {
  @Input() close!: void;
  @Input() project: any = {};
  total: number = 0;

  constructor() {}

  ngOnInit(): void {
    this.total = this.project?.tasks.reduce(
      (accumulator: number, value: any) => {
        return accumulator + value.hours;
      },
      0
    );
  }

  handleClose = () => {
    close();
  };
}
